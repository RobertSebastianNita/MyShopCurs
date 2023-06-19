<?php

use Classes\Product;

include 'parts/header.php';
$id = $_GET['id'];
$product = new Product($id);
?>
<div class="container">
    <div class="row">
        <div class="col-12 ">
            <h1><?php echo  $product->name?></h1>
            <h2>Categoria <?php echo $product->getCategory()->name; ?></h2>
        </div>
        <?php
           $product->card();
        ?>
    </div>
    <div class="row">
        <div class="col-12">
            <h2>Produse similare</h2>
        </div>
        <?php
        foreach (array_slice($product->getCategory()->getProducts(),0,5) as $similarProduct){
            if($similarProduct->id != $product->getId()){
                $similarProduct->card();
            }
        }
        ?>
    </div>
</div>
<?php
include 'parts/footer.php';