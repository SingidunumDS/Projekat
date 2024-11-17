<?php

namespace app\controllers;
use app\models\UserModel;
use app\core\DBConnection;
use app\models\UserRoleModel;
use app\models\RoleModel;
use app\core\Application;

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
        Application::$app->session->set('successNotification', 'Uspesno ste izmenili korisnika');
        header('Location:/getUsers');
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
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $model->password = $password;
        $model->add();
        $model->getOne("where email = '{$_POST['email']}'");

        $role = new RoleModel();
        $role->getOne("where role_id = {$_POST['role']}");

        $user_role = new UserRoleModel();
        $user_role->user_id = $model->user_id;
        $user_role->role_id = $role->role_id;
        $user_role->add();
        Application::$app->session->set('successNotification', 'Uspesno ste kreirali korisnika');
        header("location:/getUsers");
    }

    public function deleteUser() {
        if(isset($_GET['user_id']) && is_numeric($_GET['user_id'])) {
            $userId = $_GET['user_id'];
            $model = new UserModel();
            $model->getOne("where user_id = {$userId}");

            $user_role = new UserRoleModel();
            $user_role->getOne("where user_id = {$userId}");
            $user_role->delete("WHERE user_id = {$userId}");
            $model->delete("WHERE user_id = {$userId}");
            Application::$app->session->set('successNotification', 'Uspesno ste obrisali korisnika');
            header("location:/getUsers");
        } else
            echo "USER ID DOESNT MATCH";
    }

    public function accessRoles()
    {
        return ['admin'];
    }
}