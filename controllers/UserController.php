<?php

namespace app\controllers;
use app\models\UserModel;
use app\core\DBConnection;
class UserController extends BaseController
{
    public function readUser() {
        $model = new UserModel();
        $result = $model->getOne("");
        $this->view->render('getUser', 'main', $model);
    }

    public function readAll() {
        $model = new UserModel();
        $result = $model->getAll("");
        $this->view->render('getUsers', 'main', $result);
    }

    public function userUpdate() {
        $model = new UserModel();
        $user = $model->getOne("where user_id={$_GET['user_id']}");
        $this->view->render('updateUser', 'main', $user);
    }

    public function processUpdateUser() {
        $model = new UserModel();
        $model->mapData($_POST);
        $model->update("where user_id = {$_POST['user_id']}");

    }
}