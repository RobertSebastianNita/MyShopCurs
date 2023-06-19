<?php

namespace Classes;

class Subscriber extends Base
{
    public $email;

    public static function getTableName()
    {
        return "subscribers";
    }
}