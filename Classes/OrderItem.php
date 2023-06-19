<?php
namespace Classes;

class OrderItem extends Base
{
    public $productId;
    public $orderId;
    public $quantity;
    public $price;


    public static function getTableName()
    {
       return "order_items";
    }
}