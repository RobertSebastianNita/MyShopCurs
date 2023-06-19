<?php

use Classes\Category;

include "parts/header.php";
$id = $_GET['id'];
$category = new Category($id);
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-12 mt-5">
            <h2>Categoria <?php echo $category->name; ?></h2>
            <?php
              foreach ($category->getProducts() as $product) {
                  $product->card();
              }
            ?>
        </div>
    </div>
</div>
<?php include 'parts/footer.php' ?>