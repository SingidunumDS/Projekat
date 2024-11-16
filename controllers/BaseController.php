<?php

namespace app\controllers;
use app\core\View;
use app\core\Application;

abstract class BaseController {
    protected View $view;

    abstract public function accessRoles();
    public function __construct() {
        $this->view = new View();

        $controllerRoles = $this->accessRoles();
        $userRoles = Application::$app->session->get('user');

        if($controllerRoles === []) {
            return;
        }

        $hasAccess = false;

        foreach($userRoles as $userData) {
            $userRole = $userData->role;
            foreach($controllerRoles as $controllerRole) {
                if($controllerRole === $userRole) {
                    $hasAccess = true;
                }
            }
        }

        if($hasAccess) {
            return;
        }else {
            header("location:/accessDenied");
        }
    }
}