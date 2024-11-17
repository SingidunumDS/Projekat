<?php

namespace app\models;

use app\core\BaseModel;

class RegistrationModel extends BaseModel
{
    public $user_id = "";
    public $email = "";
    public $firstName = "";
    public $lastName = "";
    public $password = "";

    public function getTableName() {
        return "user";
    }
    public function readColumns()
    {
        return ['user_id', 'email', 'firstName', 'lastName', 'password'];
    }

    public function editColumns() {
        return ['email', 'firstName', 'lastName', 'password'];
    }

    public function validationRules() {
        return [
            "email" => [self::RULE_REQUIRED, self::RULE_EMAIL, self::RULE_UNIQUE_EMAIL],
            "firstName" => [self::RULE_REQUIRED],
            "lastName" => [self::RULE_REQUIRED],
            "password" => [self::RULE_REQUIRED]
        ];
    }
}