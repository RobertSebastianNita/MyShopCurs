<?php

use Classes\CartItem;

include "functions.php";
$id= $_GET['id'];
$data=$_POST;
$cartItem = new CartItem($id);
$cartItem->quantity = $data['quantity'];
$cartItem->save();
header('Location: cart.php');