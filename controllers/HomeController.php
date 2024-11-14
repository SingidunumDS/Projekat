<?php

namespace app\controllers;

use app\core\Application;

class HomeController extends BaseController
{
    public function home() {
        if(Application::$app->session->get('user'))
            $this->view->render('home', 'main', null);
        else
            print_r("ERROR");
    }
}