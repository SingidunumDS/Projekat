<?php

namespace app\core;

class Router {
    public Request $request;
    public array $routes = [];

    public function __construct() {
        $this->request = new Request();
    }

    public function resolve() {
        $path = $this->request->path();
        $method = $this->request->method();

        // Prolazimo kroz sve rute za dati metod (GET, POST)
        foreach ($this->routes[$method] as $route => $callback) {
            // Zamenjujemo dinamičke delove rute sa regularnim izrazima
            $routePattern = '#^' . preg_replace('/\{([a-zA-Z0-9_]+)\}/', '([a-zA-Z0-9_]+)', $route) . '$#';

            // Ako se URL poklapa sa šablonom, pozivamo callback
            if (preg_match($routePattern, $path, $matches)) {
                // Uklanjamo prvi element niza koji sadrži potpunu putanju
                array_shift($matches);
                // Prosleđujemo parametre rutom u kontroler
                $controller = new $callback[0]();
                return call_user_func_array([$controller, $callback[1]], $matches);
            }
        }

        // Ako nema odgovarajuće rute, vraćamo 404
        http_response_code(404);
        echo "NOT FOUND";
    }

    public function get($path, $callback) : void {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback) : void {
        $this->routes['post'][$path] = $callback;
    }
}