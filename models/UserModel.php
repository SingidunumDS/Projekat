<?php

namespace app\models;

use app\core\DBConnection;
use app\core\BaseModel;

class UserModel extends BaseModel{
    public int $user_id;
    public string $firstName;
    public string $lastName;
    public string $email;

    public function getTableName() : string
    {
        return "user";
    }

    public function readColumns() : array
    {
        return ['user_id', 'email', 'firstName', 'lastName'];
    }

    public function editColumns() : array {
        return ['email', 'firstName', 'lastName'];
    }
}