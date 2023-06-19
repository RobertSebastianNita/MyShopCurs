<?php

namespace Classes;

class ProductExtendedWaranty extends Product
{
    /** @var Product */
    public $parentProduct;

    public function  getFinalPrice()
    {
        return $this->parentProduct->getFinalPrice() * 10/100; // procent din cat se calculeaza pretul garantiei
    }

    public function getName()
    {
        return $this->name .'( '. $this->parentProduct->name. ')';
    }
}