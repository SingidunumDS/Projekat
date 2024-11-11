<?php

namespace app\core;
use mysqli;
use app\core\DBConnection;

abstract class BaseModel {
    abstract public function getTableName();
    abstract public function readColumns();

    public function getOne(string $where) {
        $db = new DBConnection();
        $conn = $db->connection();

        $query = "select " . implode(", ", $this->readColumns()) . " from {$this->getTableName()} $where";

        $dbResult = $conn->query($query);
        $result = $dbResult->fetch_assoc();

        if($result != null)
            $this->mapData($result);

        return $this;
    }

    public function getAll($where) : array
    {
        $db = new DBConnection();
        $conn = $db->connection();

        $tableName = $this->getTableName();
        $columns = $this->readColumns();

        $query = "select " . implode(", ", $columns) . " from {$tableName} $where";

        $dbResult = $conn->query($query);

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
        $db = new DBConnection();
        $conn = $db->connection();

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

        $conn->query($query);
    }

    public function add() {
        $db = new DBConnection();
        $conn = $db->connection();

        $tableName = $this->getTableName();
        $columns = $this->editColumns();

        $columnsHelper = array_map(function($attribute) {
            return ":{$attribute}";
        }, $columns);

        $query = "INSERT INTO {$tableName} (" . implode(", ", $columns) . ") VALUES (" . implode(", ", $columnsHelper) . ")";

        foreach($columns as $attribute) {
            $query = str_replace(":$attribute", "'{$this->{$attribute}}'", $query);
        }

        $conn->query($query);
    }

    public function delete($where) {
        $db = new DBConnection();
        $conn = $db->connection();

        $tableName = $this->getTableName();
        $columns = $this->editColumns();

        $query = "DELETE FROM {$tableName} WHERE $where";
        $conn->query($query);
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

}