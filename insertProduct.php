<?php

use Classes\Category;
use Classes\Vendor;

include "parts/header.php";
?>
<div class="row">
    <div class="col-12">
        <form action="processInsertProduct.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="formGroupExampleInput">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter product name">

            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Price</label>
                <input type="text" class="form-control" name="price" id="price" placeholder="Enter product price">

            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Description</label>
                <input type="text" class="form-control" name="description" id="description" placeholder="Enter product description">

            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Code</label>
                <input type="text" class="form-control" name= "code" id="code" placeholder="Enter product code">

            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Discount</label>
                <input type="text" class="form-control" name="discount" id="discount" placeholder="Enter product discount">

            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Category</label>
                <select id="category" name="category_id" class="form-control">
                    <?php foreach (Category::findAll() as $category ): ?>
                    <option value="<?php echo $category->getId() ?>"> <?php  echo $category->name; ?></option>
                    <?php endforeach; ?>
                </select>

            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Vendor</label>
                <select id="category" name="vendor_id" class="form-control">
                    <?php foreach (Vendor::findAll() as $vendor ): ?>
                        <option value="<?php echo $vendor->getId() ?>"> <?php  echo $vendor->name; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Image</label>
                <input type="file" class="form-control" name= "image" id="image" placeholder="Enter product image">

            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
</div>



<?php include 'parts/footer.php' ?>
