<?php

namespace app\core;
use mysqli;
use app\core\DBConnection;

abstract class BaseModel {
    public const RULE_REQUIRED = "rule_required";
    public const RULE_EMAIL = "rule_email";
    public $errors;

    public $db;
    private $conn;
    abstract public function getTableName();
    abstract public function readColumns();

    public function __construct() {
        $this->db = new DBConnection();
        $this->conn = $this->db->connection();
    }

    public function getOne(string $where) {
        $query = "select " . implode(", ", $this->readColumns()) . " from {$this->getTableName()} $where";

        $dbResult = $this->conn->query($query);
        $result = $dbResult->fetch_assoc();

        if($result != null)
            $this->mapData($result);

    }

    public function getAll($where) : array {
        $tableName = $this->getTableName();
        $columns = $this->readColumns();

        $query = "select " . implode(", ", $columns) . " from {$tableName} $where";

        $dbResult = $this->conn->query($query);

        $resultArr = [];
        $className = get_class($this);
        while($result = $dbResult->fetch_assoc()) {
            $user = new $className();
            $user->mapData($result);
            $resultArr[] = $user;
        }
        return $resultArr;
    }

    public function update($where) {
        $tableName = $this->getTableName();
        $columns = $this->editColumns();

        $columnsHelper = array_map(function($attribute) {
            return "{$attribute} = :{$attribute}";
        }, $columns);

        $query = "update {$tableName} set " . implode(", ", $columnsHelper) . " " . $where;

        foreach($columns as $attribute) {
            $query = str_replace(":$attribute", is_string($this->{$attribute}) ? '"' . $this->{$attribute} . '"' : $this->{$attribute},
                $query);
        }

        $this->conn->query($query);
    }

    public function add() {
        $tableName = $this->getTableName();
        $columns = $this->editColumns();

        $columnsHelper = array_map(function($attribute) {
            return ":{$attribute}";
        }, $columns);

        $query = "INSERT INTO {$tableName} (" . implode(", ", $columns) . ") VALUES (" . implode(", ", $columnsHelper) . ")";

        foreach($columns as $attribute) {
            $query = str_replace(":$attribute", "'{$this->{$attribute}}'", $query);
        }

        $this->conn->query($query);
    }

    public function delete($where) {
        $tableName = $this->getTableName();
        $columns = $this->editColumns();

        $query = "DELETE FROM {$tableName} WHERE $where";
        $this->conn->query($query);
    }

    public function mapData($data) : void {
        if($data != null) {
            foreach ($data as $key => $value) {
                if(property_exists($this, $key)) {
                    $this->{$key} = $value;
                }
            }
        }
    }

    public function validate() {
        $allRules = $this->validationRules();

        foreach($allRules as $attribute => $rules) {
            $value = $this->{$attribute};

            foreach($rules as $rule) {
                if($rule === self::RULE_REQUIRED) {
                    if(!$value) {
                        $this->errors[$attribute][] = "This field is required";
                    }
                }

                if($rule == self::RULE_EMAIL) {
                    if(!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                        $this->errors[$attribute][] = "This field is not a valid email address";
                    }
                }
            }
        }


    }
}