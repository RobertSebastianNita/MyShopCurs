<?php

use Classes\Vendor;

include "parts/header.php";
$id = $_GET['id'];
$vendor = new Vendor($id);
?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12 mt-5">
                <h2>Vendor <?php echo $vendor->name; ?></h2>
                <?php
                foreach ($vendor->getProducts() as $product) {
                    $product->card();
                }
                ?>
            </div>
        </div>
    </div>
<?php include 'parts/footer.php' ?>