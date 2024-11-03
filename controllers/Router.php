<?php

namespace app\controllers;

class Router {
    public Request $request;
    public array $routes = [];

    public function __construct() {
        $this->request = new Request();
    }

    public function resolve() {

        $path = $this->request->path();
        $method = $this->request->method();
        $callback = $this->routes[$method][$path] ?? false;

        if(is_array($callback)) {
            $callback[0] = new $callback[0]();
            return call_user_func($callback);
        }
    }

    public function get($path, $callback) {
        $this->routes['get'][$path] = $callback;
    }
}