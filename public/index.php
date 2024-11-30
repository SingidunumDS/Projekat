<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once __DIR__ . '/../vendor/autoload.php';
use app\core\Application;
use app\controllers\UserController;
use app\controllers\HomeController;
use app\controllers\AuthController;
use app\controllers\CarController;

$app = new Application();

$app->router->get('/', [CarController::class, 'index']);
$app->router->get('/home', [HomeController::class, 'home']);
$app->router->get('/getUser', [UserController::class, 'readUser']);
$app->router->get('/getUsers', [UserController::class, 'readAll']);
$app->router->get('/updateUser', [UserController::class, 'userUpdate']);
$app->router->post('/processUpdateUser', [UserController::class, 'processUpdateUser']);
$app->router->get('/createUser', [UserController::class, 'createUser']);
$app->router->post('/processCreateUser', [UserController::class, 'processCreateUser']);
$app->router->get('/deleteUser', [UserController::class, 'deleteUser']);
$app->router->get('/registration', [AuthController::class, 'registration']);
$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/processRegistration', [AuthController::class, 'processRegistration']);
$app->router->post('/processLogin', [AuthController::class, 'processLogin']);
$app->router->get('/logout', [AuthController::class, 'logout']);
$app->router->get('/accessDenied', [AuthController::class, 'accessDenied']);
$app->router->post('/getCars', [CarController::class, 'getCars']);
$app->run();