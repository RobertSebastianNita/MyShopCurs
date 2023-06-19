<?php
include "functions.php";
$data = $_POST;
$files = $_FILES;
copy($files['image']['tmp_name'],'/var/www/html/national04/adina/MyShop/images/'.$files['image']['name']);
$productId = insert('products',$data);
$image= [
    'path' => 'images/'.$files['image']['name'],
    'productId'=>$productId
];
insert('images',$image);
header('Location: index.php');