<?php

namespace app\controllers;
use app\controllers\BaseController;
use app\models\CarModel;

class ReportController extends BaseController
{

    public function getCarsYear() {
        $this->view->render('getCarsYear', 'main', null);
    }

    public function processCarsYear() {
        if(isset($_POST)) {
            $car = new CarModel();
            $arr = [];
            $firstYear = $_POST["firstYear"];
            $lastYear = $_POST["lastYear"];
            $arr = $car->getYears("where year > $firstYear and year < $lastYear");
            $this->view->render('getCarsYear', 'main', $arr);
        }

    }

    public function accessRoles() {
        return ['admin', 'user'];
    }
}