<?php
include "functions.php";
$id= $_GET['id'];
delete();
header('Location: cart.php');