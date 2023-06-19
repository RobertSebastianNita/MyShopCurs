<?php
namespace Classes;

class User extends Base
{

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE_PAID = 2;
    public $firstName;
    public $lastName;
    public $role;
    public $avatar;
    public $username;
    public $password;
    public $email;
    public $status;


    public function getCarts() {

    }
    public function getAddresses() {
        return Address::findBy('user_id', $this->getId());
    }

    public static function getTableName()
    {
        return "users";
    }
}