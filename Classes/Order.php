<?php
namespace Classes;

class Order extends Base
{
    public $userId;
    public $cartId;
    public $shippingMethod;
    public $addressId;
    public $paymentMethod;

    public static function getTableName()
    {
        return 'orders';
    }
}