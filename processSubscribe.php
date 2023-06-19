<?php

use Classes\Subscriber;

include "functions.php";

$subscriber =  new Subscriber();
$subscriber->email = $_POST['email'];
$subscriber->save();
$_SESSION['success_message'] = "Te-ai inscris cu succes la newsletterul nostru";
header('Location: index.php');