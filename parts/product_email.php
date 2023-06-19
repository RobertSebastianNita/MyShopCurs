<div class="card" style="width: 18px;">
    <img class="card-img-top" src="http://45.15.23.59/national04/adina/MyShop/<?php echo $product->getFirstImage()->path; ?>" alt="<?php  echo $product->name; ?>">
    <div class="card-body">
        <h5 class="card-title"><?php echo $product->name; ?></h5>
        <h3> <?php echo $product->getFinalPrice(); ?><span>Lei</span></h3>';
        <a href="http://45.15.23.59/national04/adina/MyShop/addToCart.php?id= <?php $product->getId(); ?>" class="btn btn-primary">Adauga in cos</a>
    </div>
</div>