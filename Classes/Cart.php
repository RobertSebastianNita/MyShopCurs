<?php
namespace Classes;

class Cart extends Base
{

    public $userId;

    public function getUser(): User
    {
        return new User($this->userId);
    }

    /**
     * @return CartItem[]
     */
    public function getCartItems(): array
   {
     return CartItem::findBy('cartId', $this->getId());
   }


   public function getTotal() {
        // luam fiecare cartItem si adunam totalul din CartItem la totalul Cartului
       $total = 0;
       foreach ($this->getCartItems() as $cartItem ) {
           $total +=  $cartItem->getTotal();
       }
       return $total;
   }

   public function getFinalTotal() {
       $total = $this->getTotal();
       if($total >1000) {
           return $total * 0.95;
       } else {
           return $total;
       }
   }

   public function add($productId, $parentId = null) {
        if(is_null($parentId)) {
            // produsul din cart5_items al carui product_id = $productId si apartine cosului curent de cumparaturi

            $cartItem = query("SELECT * FROM cart_items WHERE productId=$productId AND cartId={$this->getId()}");
            var_dump($cartItem);
        } else {
            $cartItem = query("SELECT * FROM cart_items WHERE productId=$productId AND parentId=$parentId AND cartId={$this->getId()}" );
        }

        // $cartITem= [[0]=> ]
       if(count($cartItem)> 0) {
           $cartItem =new CartItem($cartItem[0]['id']);
           $cartItem->quantity = $cartItem->quantity+1;
           $cartItem->save();
       } else {
           $cartItem = new CartItem();
           $cartItem->cartId = $this->getId();
           $cartItem->productId = $productId;
           $cartItem->quantity = 1;
           if(!is_null($parentId)){
               $cartItem->parentId = $parentId;
           }
           $cartItem->save();
       }
   }

   public function getProductCount(): int
   {
        $totalProducts =0;
        foreach ($this->getCartItems()  as $cartItem) {
            $totalProducts += $cartItem->quantity;
        }
        return $totalProducts;
   }

   public function getWeight() {
        $totalWeight = 0;
        foreach ($this->getCartItems() as $cartItem) {
            $totalWeight += $cartItem->getProduct()->weight;
        }
        return $totalWeight;
    }

    public static function getTableName()
    {
        return 'carts';
    }
}