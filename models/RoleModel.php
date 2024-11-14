<?php

namespace app\models;

use app\core\BaseModel;

class RoleModel extends BaseModel
{

    public int $role_id;
    public string $name;
    public function getTableName()
    {
        return 'role';
    }

    public function readColumns()
    {
        return ['role_id', 'name'];
    }

    public function editColumns() {
        return ['name'];
    }

    public function validationRules() {
        return [
            "name" => [self::RULE_REQUIRED]
        ];
    }
}