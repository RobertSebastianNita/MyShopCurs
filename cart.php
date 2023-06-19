<?php
include "parts/header.php";

?>
<div class="row">
    <div class="col-12">
        <h2>Shopping Cart</h2>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Image</th>
            <th scope="col">Product</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Total</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
          <?php $cart = getCurrentCart(); ?>
          <?php  foreach ($cart->getCartItems() as $cartItem): ?>
          <tr>
              <th scope="row">
                 <img height="50"src="<?php  echo  $cartItem->getProduct()->getFirstImage()->path?>" alt="poza">
              </th>
              <td><?php echo $cartItem->getProduct()->name; ?></td>
              <td><?php echo $cartItem->getProduct()->getFinalPrice(); ?></td>
              <td>
                 <form action="updateCartItem.php?id=<?php echo  $cartItem->getId() ?>" method="POST">
                     <input min="1" type="number" name="quantity" value="<?php echo $cartItem->quantity; ?>">
                     <button class="btn btn-primary" type="submit"> Update</button>
                 </form>
              </td>
              <td><?php echo $cartItem->getTotal(); ?> LEI </td>
              <td><a href="deleteCartItem.php?id=<?php echo $cartItem->getId()?>" class="btn btn -danger">Delete</a></td>
          </tr>
        <?php endforeach;?>
        <tr>
            <th scope="row"></th>
            <td colspan="4" class="align-right">Total</td>
            <td>
                <?php if ( $cart->getTotal() != $cart->getFinalTotal()) :?>
                 <s><?php  echo  $cart->getTotal();?> LEI </s>
                <?php endif;?>
                <?php echo $cart->getFinalTotal();  ?> LEI
            </td>
        </tr>
        </tbody>
    </table>
    <div class="col-12">
        <p>
            <?php
               if(count($cart->getCartItems())>0):
            ?>
                <a href="checkout.php" class="btn btn-primary">Finalize order</a>
            <?php endif;?>
        </p>
    </div>
</div>


<?php
include "parts/footer.php";

?>
