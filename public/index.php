<?php

require_once __DIR__ . '/../vendor/autoload.php';
use app\core\Application;
use app\controllers\UserController;
use app\controllers\HomeController;

$app = new Application();

$app->router->get('/', [HomeController::class, 'home']);
$app->router->get('/getUser', [UserController::class, 'readUser']);
$app->router->get('/getUsers', [UserController::class, 'readAll']);
$app->router->get('/updateUser', [UserController::class, 'userUpdate']);
$app->router->post('/processUpdateUser', [UserController::class, 'processUpdateUser']);

$app->run();