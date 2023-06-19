<?php
include "parts/header.php";
// pasul 1 check if user is logged in  ii trebuie o adresa noua  - sectiune de formular cu adresa noua ->  tabela noua de address - legata de tabela de user
?>
<div class="row">
<!--    daca utilizatorul este anonim  - > formularul de mai jos -->
    <div class="col-12 mt-5 mb-2">
        <h2>Checkout cart</h2>
        <form method="post" action="processCheckout.php">
            <?php if(getAuthUser()): ?>
              <div class="form-group">
                <div class="form-group col-md-6">
                    <label for="address_id">Address</label>
                    <select class="form-control" id="address_id" name="">
                        <option value="">Adauga adresa noua</option>
                        <?php foreach (getAuthUser()->getAddresses() as $address): ?>
                          <option value="<?php echo $address->getId(); ?>"><?php echo $address->address ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <?php endif; ?>
          <div id="addAddress">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="address[first_name]">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="last_name">Last name</label>
                        <input type="text" class="form-control" id="last_name" name="address[last_name]">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="address[phone]">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="city">City</label>
                        <input type="text" class="form-control" id="city" name="address[city]">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="state">State</label>
                        <select id="state" class="form-control">
                            <option selected>Dolj</option>
                            <option>Gorj</option>
                            <option>Valcea</option>
                        </select>
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="address">Address</label>
                        <textarea class="form-control" id="address" name="address[address]" placeholder="Address"></textarea>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="shipping_method">Shipping Method</label>
                    <select  class="form-control" id="shipping_method" name="order[shipping_method]">
                        <option value="posta">Posta romana</option>
                        <option value="curier">Sameday</option>
                        <option value="ridicare">Ridicare personala</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="payment_method">Payment Method</label>
                    <select class="form-control" id="payment_method" name="order[payment_method]">
                        <option value="ramburs">Ramburs</option>
                        <option value="card">Card</option>
                        <option value="op">Ordin de plata</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Finalize</button>
        </form>
    </div>
</div>

<script>
    $('#address_id').on('change', function (){
        if($('#address_id').val() >0 ){
            $('#addAddress').css('display','none');
        } else {
            $('#addAddress').css('dispaly','block');
        }
    });
</script>
<?php
include "parts/footer.php";

?>
