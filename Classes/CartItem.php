<?php
namespace Classes;

class CartItem extends Base
{
     public $cartId;
     public $productId;
     public $quantity;
     public $parentId;

    public function getCart():Cart {
      return new Cart($this->cartId);
    }

    public function getTotal() {
        $total= $this->quantity*$this->getProduct()->getFinalPrice();
        return $total;
    }
    public function getProduct() {
        $product = new Product($this->productId);
        if($product->type === 'service'){
            $productEw = new ProductExtendedWaranty($this->productId);
            $productEw->parentProduct = $this->getParentProduct();
            return $productEw;
        }
        if($product->type === 'delivery') {
            $productDelivery =  new ProductDelivery($this->productId);
            $productDelivery->cart = $this->getCart();
            return $productDelivery;
        }
       return $product;

    }

    public function getParentProduct():Product {
        return new Product($this->parentId);
    }

    public static function getTableName()
    {
        return 'cart_items';
    }
}