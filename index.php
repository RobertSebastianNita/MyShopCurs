<?php

use Classes\Product;

include"parts/header.php";?>

<div class="row">
    <div class="col-12">
        <form action="processSubscribe.php" method="post" class="form-inline my-2 my-lg-0">
            <label  for="subscribe">Subscribe to Newsletter</label>
            <input class="form-control mr-sm-2" id="subscribe" type="email" name="email" placeholder="Email"">
            <button class="btn btn-primary my-2 my-sm-0" type="submit">Subscribe</button>
        </form>
    </div>

</div>

<div class="row">
    <div class="col-12">
        <h2>Cele mai noi produse</h2>
    </div>
    <?php
       $newProductIds= query('SELECT id from products ORDER BY id DESC LIMIT 4');
       foreach($newProductIds as $newProductId){
           $product= new Product($newProductId['id']);
           $product->card();
       }

    ?>
</div>
<div class="row">
    <div class="col-12 mt-5 mb-3">
        <h2>Canapele</h2>
    </div>
    <?php
    $product= new Product(10);
    $product->card();
    $product= new Product(1);
    $product->card();
    $product= new Product(13);
    $product->card();
    $product= new Product(14);
    $product->card();

    ?>

</div>
<?php
 include "parts/footer.php";
?>