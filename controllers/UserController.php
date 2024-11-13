<?php

namespace app\controllers;
use app\models\UserModel;
use app\core\DBConnection;
class UserController extends BaseController
{
    public function readUser() {
        $model = new UserModel();
        $model->getOne(" where user_id = {$_GET['user_id']}");
        $this->view->render('getUser', 'main', $model);
    }

    public function readAll() {
        $model = new UserModel();
        $result = $model->getAll("");
        $this->view->render('getUsers', 'main', $result);
    }

    public function userUpdate() {
        $model = new UserModel();
        $model->getOne("where user_id={$_GET['user_id']}");
        $this->view->render('updateUser', 'main', $model);
    }

    public function processUpdateUser() {
        $model = new UserModel();
        $model->mapData($_POST);
        $model->update("where user_id = {$_POST['user_id']}");
    }

    public function createUser() {
        $this->view->render('createUser', 'main', null);
    }

    public function processCreateUser() {
        $model = new UserModel();
        $model->mapData($_POST);
        $model->validate();
        if($model->errors) {
            $this->view->render('createUser', 'main', $model);
            exit;
        }
        $model->add();
        header("location:/getUsers");
    }

    public function deleteUser() {
        $model = new UserModel();
        $model->delete("user_id = {$_GET['user_id']}");
        header("location:/getUsers");
    }

    public function signIn() {
        $this->view->render('signIn', 'main', null);
    }
}