<?php

namespace app\models;
use app\core\BaseModel;

class CarModel extends BaseModel
{
    public $car_id;
    public $brand;
    public $model;
    public $year;
    public $color;
    public $fuel;
    public $user_id;
    public $price;
    public $image;


    public function getTableName()
    {
        return 'car';
    }

    public function readColumns()
    {
        return ['car_id', 'brand', 'model', 'year', 'color', 'price', 'image', 'user_id', 'fuel', 'price'];
    }

    public function editColumns() {
        return ['brand', 'model', 'year', 'color', 'price', 'image', 'user_id', 'fuel', 'price'];
    }

    public function getYears($where) {
        $query = "SELECT year, COUNT(*) AS broj_automobila FROM car $where GROUP BY year ORDER BY year DESC;";
        $dbResult = $this->conn->query($query);
        $arr = [];
        $arr = $dbResult->fetch_all(MYSQLI_ASSOC);
        return $arr;
    }

    public function validationRules() {
        return [
            "brand" => [self::RULE_REQUIRED],
            "model" => [self::RULE_REQUIRED],
            "year" => [self::RULE_REQUIRED],
            "color" => [self::RULE_REQUIRED],
            "price" => [self::RULE_REQUIRED],
            "image" => [self::RULE_REQUIRED],
            "fuel" => [self::RULE_REQUIRED],
            "user_id" => [self::RULE_REQUIRED]
        ];
    }
}