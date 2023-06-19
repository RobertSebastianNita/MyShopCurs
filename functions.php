<?php

use Classes\Cart;
use Classes\User;

session_start();
include "Classes/Base.php";
include "Classes/Product.php";
include "Classes/Image.php";
include "Classes/Vendor.php";
include "Classes/Category.php";
include "Classes/Cart.php";
include "Classes/CartItem.php";
include "Classes/User.php";
include "Classes/ProductExtendedWaranty.php";
include "Classes/Address.php";
include "Classes/Subscriber.php";
include "Classes/Order.php";
include "Classes/OrderItem.php";

define('SALT','dsakjashdkjkjisdf3244@#$@#$dssdf');

$connection = mysqli_connect('45.15.23.59','root', 'Sco@l@it123','national-04-adina-property');
function query($sql){
    global $connection;
    $query = mysqli_query($connection,$sql);
    if(is_bool($query)) {
        return $query;
    } else {
        return mysqli_fetch_all($query,MYSQLI_ASSOC);
    }

}

function getCurrentCart(){
    if (isset($_SESSION['cartId'])){
        return new Cart($_SESSION['cartId']);
    } else {
        $cart = new Cart();
        $cart->userId=0;
        $cart->save();
        $_SESSION['cartId'] = $cart->getId();
        return $cart;
    }
}

function formatPrice($price) {
    $intPart = intval($price);

    $floatPart = intval(($price-$intPart)*100);

    return "$intPart<sup>$floatPart</sup>";
}

function getAuthUser()
{
    if (isset($_SESSION['user_id'])) {
        return new User($_SESSION['user_id']);
    } else {
        return false;
    }
}