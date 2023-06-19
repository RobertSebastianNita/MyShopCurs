<?php
include "functions.php";

$email =  $_POST['email'];
$password = md5($_POST['password']);

$userData = query("SELECT * FROM users WHERE email='$email' AND password='$password'");

if(count($userData)>0){
    $_SESSION['user_id'] = $userData[0]['id'];
    header("Location: index.php");
} else {
    header("Location: login.php");
}