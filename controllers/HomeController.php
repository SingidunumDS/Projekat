<?php

namespace app\controllers;

class HomeController extends BaseController
{
    public function home() {
        $this->view->render('home', 'main', null);
    }
}