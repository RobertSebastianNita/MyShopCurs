<?php
namespace Classes;

class Category extends Base
{
    public $name;
    public $productCount;


    public function getProducts():array {
       return Base::findBy('category_id', $this->getId());
    }


    public static function getTableName()
    {
        return "categories";
    }
}