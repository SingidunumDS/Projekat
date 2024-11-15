<?php

namespace app\controllers;

use app\models\AuthModel;
use app\models\RoleModel;
use app\models\SessionUserModel;
use app\models\UserRoleModel;
use app\core\Application;

class AuthController extends BaseController
{
    public function registration() {
        $this->view->render('registration', 'auth', new AuthModel());
    }

    public function processRegistration() {
        $model = new AuthModel();
        $model->mapData($_POST);
        $model->validate();
        if($model->errors) {
            $this->view->render('registration', 'auth', $model);
            exit;
        }

        $model->password = password_hash($model->password, PASSWORD_DEFAULT);
        $model->add();
        $model->getOne("where email = '$model->email'");

        $role = new RoleModel();
        $role->getOne("where name = 'korisnik'");

        $user_role = new UserRoleModel();
        $user_role->user_id = $model->user_id;
        $user_role->role_id = $role->role_id;

        $user_role->add();

        $this->view->render('registration', 'auth', $model);
    }

    public function login() {
        if(Application::$app->session->get('user')) {
            header("location:/home");
        }
        $this->view->render('login', 'auth', new AuthModel());
    }

    public function processLogin() {
        $model = new AuthModel();
        $model->mapData($_POST);
        $model->validate();
        if($model->errors) {
            $this->view->render('login', 'auth', $model);
            exit;
        }

        $loginPassword = $model->password;
        $model->getOne("where email = '$model->email'");
        if(!password_verify($loginPassword, $model->password)) {
            $model->errors[] = "Podaci nisu validni.";
            $this->view->render('login', 'auth', $model);
            exit;
        }
        $session = new SessionUserModel();
        $session->email = $model->email;
        $session->getSessionData();

        Application::$app->session->set('user', $session);
        header("location:/home");
    }

    public function logout() {
        Application::$app->session->delete('user');
        header("location:/login");
    }
}