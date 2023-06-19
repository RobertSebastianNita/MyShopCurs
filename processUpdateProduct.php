<?php

use Classes\Product;

include "functions.php";
$id = $_GET['id'];
$data = $_POST;
$files = $_FILES;
copy($files['image']['tmp_name'],'/var/www/html/national04/adina/MyShop/images/'.$files['image']['name']);
$product = new Product($id);
$product->save();

$image= [
    'path' => 'images/'.$files['image']['name'],
    'productId'=>$id
];
insert('images',$image);
header('Location: index.php');