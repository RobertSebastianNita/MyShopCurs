<?php
namespace Classes;

class Vendor extends Base
{
    public $name;

    public function getProducts(): array
    {
        return Product::findBy('vendor_id', $this->getId());
    }

    public static function getTableName(): string
    {
        return 'vendors';
    }
}