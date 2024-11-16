<?php

namespace app\models;

use app\core\BaseModel;

class SessionUserModel extends BaseModel
{
    public int $user_id;
    public string $first_name;
    public string $last_name;
    public string $email;
    public $role;

    public function getSessionData() {
        $query = "SELECT u.user_id, u.firstName, u.lastName, u.email, r.name as role FROM user_role ur LEFT JOIN user u ON ur.user_id = u.user_id LEFT JOIN role r ON ur.role_id = r.role_id WHERE u.email = '{$this->email}';";

        $dbResult = $this->conn->query($query);

        $arrResult = [];
        while($result = $dbResult->fetch_assoc()) {
            $user = new SessionUserModel();
            $user->mapData($result);
            $arrResult[] = $user;
        }
        return $arrResult;
    }
    public function getTableName() {
        return '';
    }

    public function readColumns() {
        return [];
    }
}