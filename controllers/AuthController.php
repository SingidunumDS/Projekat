<?php

namespace app\controllers;

use app\models\LoginModel;
use app\models\RegistrationModel;
use app\models\RoleModel;
use app\models\SessionUserModel;
use app\models\UserRoleModel;
use app\core\Application;

class AuthController extends BaseController
{
    public function registration() {
        $this->view->render('registration', 'auth', new RegistrationModel());
    }

    public function processRegistration() {
        $model = new RegistrationModel();
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
        Application::$app->session->set('successNotification', 'Uspesno ste se registrovali!');
        $this->view->render('registration', 'auth', $model);
    }

    public function login() {
        if(Application::$app->session->get('user')) {
            header("location:/home");
        }
        $this->view->render('login', 'auth', new LoginModel());
    }

    public function processLogin() {
        $model = new LoginModel();
        $model->mapData($_POST);
        $model->validate();
        if($model->errors) {
            $this->view->render('login', 'auth', $model);
            exit;
        }

        $loginPassword = $model->password;
        $model->getOne("where email = '$model->email'");

        if(password_verify($loginPassword, $model->password)) {
            $session = new SessionUserModel();
            $session->email = $model->email;
            Application::$app->session->set('user', $session->getSessionData());
            header("location:/home");
        }

        $model->password = $loginPassword;
        Application::$app->session->set("errorNotification", "Neuspesan login!");
        $this->view->render('login', 'auth', $model);
    }

    public function logout() {
        Application::$app->session->delete('user');
        header("location:/login");
    }

    public function accessDenied() {
        $this->view->render('accessDenied', 'auth', null);
    }

    public function accessRoles()
    {
        return [];
    }
}