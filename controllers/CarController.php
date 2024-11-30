<?php

namespace app\controllers;
use app\controllers\BaseController;
use app\models\CarModel;
use app\core\Application;

class CarController extends BaseController
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

    public function postCar() {
        $this->view->render('postCar', 'main', null);
    }

    public function getMyCars() {
        $arr = [];
        $car = new CarModel();
        $userID = Application::$app->session->get('user')[0]->user_id;
        $arr = $car->getAll("where user_id = '$userID'");
        $this->view->render('getMyCars', 'main', $arr);
    }

    public function getCarDetails($car_id) {
        $car = new CarModel();
        $car->getOne("where car_id = $car_id");
        $this->view->render('getCarDetails', 'main', $car);
    }

    public function accessRoles()
    {
        return [];
    }
}