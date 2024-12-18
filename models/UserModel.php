<?php

namespace app\models;

use app\core\DBConnection;
use app\core\BaseModel;

class UserModel extends BaseModel{
    public int $user_id;
    public $firstName = '';
    public $lastName = '';
    public $email = '';
    public $password = '';
    public $role;

    public function getTableName() : string
    {
        return "user";
    }

    public function readColumns() : array
    {
        return ['user_id', 'email', 'firstName', 'lastName', 'password'];
    }

    public function editColumns() : array {
        return ['email', 'firstName', 'lastName', 'password'];
    }

    public function validationRules() : array {
        return [
            "email" => [self::RULE_REQUIRED, self::RULE_EMAIL],
            "firstName" => [self::RULE_REQUIRED],
            "lastName" => [self::RULE_REQUIRED],
            "password" => [self::RULE_REQUIRED],
            "role" => [self::RULE_REQUIRED]
        ];
    }
}