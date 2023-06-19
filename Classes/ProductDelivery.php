<?php
namespace Classes;

class ProductDelivery extends Product
{
    /**
     * @var Cart
     */
    public $cart;
    public function getFinalPrice()
    {
        return $this->cart->getWeight() * $this->price;
    }

    public function getName() {
        return $this->name. '('. $this->cart->getWeight() . 'Kg)';
    }

}