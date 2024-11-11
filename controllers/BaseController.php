<?php

namespace app\controllers;
use app\core\View;

class BaseController {
    protected View $view;
    public function __construct() {
        $this->view = new View();
    }
}