<?php

require_once __DIR__ . '/../vendor/autoload.php';
use app\core\Application;
use app\controllers\UserController;

$app = new Application();

$app->router->get('/home', [UserController::class, 'readUser']);
$app->run();