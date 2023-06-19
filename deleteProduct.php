<?php
include 'functions.php';
$id =$_GET['id'];
delete('products',$id);
header('Location: index.php');