<?php

namespace app\models;
use app\core\BaseModel;
class ProductModel extends BaseModel
{
    public string $name;
    public int $price;
    public int $quantity;


    public function getTableName() : string
    {
        return 'product';
    }

    public function readColumns() : array
    {
        return ['name', 'price', 'quantity'];
    }
}