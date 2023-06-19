<?php
namespace Classes;

class Image extends Base
{
     public $path;
     public $productId;

    public static function getTableName()
    {
      return "images";
    }
}