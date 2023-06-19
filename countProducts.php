<?php

use Classes\Category;

include "functions.php";
foreach (Category::findAll() as $category) {
    $category->productCount = count($category->getProducts());
    $category->save();
}