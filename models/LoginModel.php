<?php

namespace app\models;

use app\core\BaseModel;

class LoginModel extends BaseModel
{
    public $user_id = "";
    public $email = "";
    public $password = "";

    public function getTableName() {
        return "user";
    }
    public function readColumns()
    {
        return ['user_id', 'email', 'password'];
    }

    public function editColumns() {
        return ['email', 'password'];
    }

    public function validationRules() {
        return [
            "email" => [self::RULE_REQUIRED, self::RULE_EMAIL],
            "password" => [self::RULE_REQUIRED]
        ];
    }
}