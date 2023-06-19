<?php

use Classes\Address;
use Classes\Order;
use Classes\OrderItem;

include "functions.php";
$data = $_POST;
$cart = getCurrentCart();
$addressData = new Address();
$addressData ->fromArray($data['address']);
$orderData =new Order();
$orderData ->fromArray($data['order']);

if(getAuthUser()){
    $addressData->userId = getAuthUser()->getId();
    $orderData ->userId = getAuthUser()->getId();
}
if($orderData->addressId =='') {
   $addressData->save();
    $orderData->addressId =$addressData->getId();
}
$orderData->cartId = $cart->getId();
$orderData ->save();
foreach ($cart->getCartItems() as $cartItem) {
    $orderItem = new OrderItem();
    $orderItem->productId = $cartItem ->productId;
    $orderItem->orderId = $orderData->getId();
    $orderItem->quantity = $cartItem->quantity;
    $orderItem->price = $cartItem->getProduct()->getFinalPrice();
    $orderItem->save();
}
unset($_SESSION['cartId']);
header('Location: index.php');






