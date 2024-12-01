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

    public function processPostCar() {
        $car = new CarModel();
        $car->mapData($_POST);
        if($car->errors) {
            $this->view->render('postCar', 'main', $car);
            exit;
        }
        $car->add();
        Application::$app->session->set("successNotification", "Uspesno ste dodali auto");
        header("location:/getMyCars");
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
        if(isset(Application::$app->session->get('user')[0])) {
            $this->view->render('getCarDetails', 'main', $car);
            return;
        }
        $this->view->render('getCarDetails', 'auth', $car);
    }

    public function deleteCar($car_id) {
        $car = new CarModel();
        $car->delete("where car_id = $car_id");
        Application::$app->session->set("successNotification", "Uspesno ste obrisali auto");
        header("location:/getMyCars");
    }

    public function accessRoles()
    {
        return ['admin','korisnik'];
    }
}