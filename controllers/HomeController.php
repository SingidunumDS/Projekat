<?php

namespace app\controllers;

use app\core\Application;
use app\models\CarModel;

class HomeController extends BaseController
{
    public function index() {
        $car = new CarModel();
        $result = $car->getAll("");
        if(Application::$app->session->get('user')) {
            $this->view->render('getCars', 'main', $result);
            exit;
        }
        $this->view->render('getCars', 'auth', $result);
    }

    public function accessRoles()
    {
        return [];
    }
}