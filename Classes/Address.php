<?php
namespace Classes;

class Address extends Base
{

     public $firstName;
     public $lastName;
     public $phone;
     public $city;
     public $state;
     public $userId;
     public $address;


    public static function getTableName()
    {
       return "addresses";
    }
}