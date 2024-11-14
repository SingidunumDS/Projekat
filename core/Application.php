<?php

namespace app\core;

class Application {
    public Router $router;
    public static Application $app;
    public Session $session;

    public function __construct() {
        $this->router = new Router();
        $this->session = new Session();
        self::$app = $this;
    }

    public function run() : void {
        $this->router->resolve();
    }
}