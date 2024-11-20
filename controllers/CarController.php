<?php

namespace app\controllers;
use app\controllers\BaseController;
use app\models\CarModel;

class CarController extends BaseController
{
    public function index() {
        $car = new CarModel();
        $result = $car->getAll("");
        $this->view->render('getCars', 'auth', $result);
    }

    public function getCars() {
        if(isset($_POST)) {
            $car = new CarModel();
            $arr = [];
            foreach($_POST as $key => $value) {
                if($value != "" || $value != null)
                    $arr[] = "$key = '$value'";
            }
            $where = "where " . implode(" and ", $arr);
            $where = str_replace("price = ", "price < ", $where);
            $result = $car->getAll($where . " order by price asc");
            $this->view->render('getCars', 'auth', $result);
        }

        $this->view->render('getCars', 'auth', null);

    }

    public function accessRoles()
    {
        return [];
    }
}