<?php

use Classes\Category;
use Classes\Vendor;

include 'functions.php';
?>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/20b790b06b.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Categories
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php $categories = Category::findAll();?>
                                <?php foreach($categories as $categoryObj):?>
                                <a class="dropdown-item" href="category.php?id=<?php echo $categoryObj->getId();?>"><?php echo $categoryObj->name;?>(<?php echo $categoryObj->productCount; ?>)</a>
                               <?php endforeach;?>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Vendors
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php $vendors = Vendor::findAll();?>
                                <?php foreach($vendors as $vendorObj):?>
                                    <a class="dropdown-item" href="vendor.php?id=<?php echo $vendorObj->getId();?>"><?php echo $vendorObj->name;?>(<?php echo count ($vendorObj->getProducts()); ?>)</a>
                                <?php endforeach;?>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="insertProduct.php">Add product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                       <li class="nav-item">
                           <a class="nav-link" href="cart.php"><span class="badge badge-primary">Cart<i class="fa fa-shopping-cart" aria-hidden="true"></i><?php echo getCurrentCart()->getProductCount();  ?> </span></a>
                       </li>
                        <li class="nav-item">
                            <?php if(getAuthUser()):?>
                                 <?php echo getAuthUser()->firstName; ?> <a class="nav-link" href="logout.php"><span class="badge badge-primary">Logout<i class="fa fa-user" aria-hidden="true"></i> </span></a>
                            <?php else: ?>
                              <a class="nav-link" href="login.php"><span class="badge badge-primary">Login<i class="fa fa-user" aria-hidden="true"></i> </span></a>
                            <?php endif;?>
                        </li>
                    </ul>
                    <form action="search.php" method="get" class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>

                </div>
            </nav>
        </div>
    </div>