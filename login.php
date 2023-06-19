<?php
include "parts/header.php";
?>
<div class="row">
    <div class="col-12 mt-5 mb-2">
        <h2>User login</h2>
        <form method="post" action="processLogin.php">
            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" id="email" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Login</button>
            </div>

        </form>

    </div>
</div>
<?php
include"parts/footer.php";
?>