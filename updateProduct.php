<?php
include "parts/header.php";
$id = $_GET['id'];
$product= find('products', $id);
?>

<div class="row">
    <div class="col-12">
        <form action="processUpdateProduct.php?id=<?php  echo $id;?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="formGroupExampleInput">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="<?php echo $product['name']; ?>" placeholder="Enter product name">

            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Price</label>
                <input type="text" class="form-control" name="price" id="price" value="<?php echo $product['price']; ?>" placeholder="Enter product price">

            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Description</label>
                <input type="text" class="form-control" name="description" id="description" value="<?php echo $product['description']; ?>" placeholder="Enter product description">

            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Code</label>
                <input type="text" class="form-control" name= "code" id="code" value="<?php echo $product['code']; ?>" placeholder="Enter product code">

            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Discount</label>
                <input type="text" class="form-control" name="discount" id="discount" value="<?php echo $product['discount']; ?>" placeholder="Enter product discount">

            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Category</label>
                <select id="category" name="category_id" class="form-control">
                    <?php foreach (findAll('categories') as $category ): ?>
                    <?php if ($product['category_id'] == $category['id']):?>
                     <option selected ="selected" value="<?php echo $category['id'] ?>"> <?php  echo $category['name']; ?></option>
                     <?php else: ?>
                        <option value="<?php echo $category['id'] ?>"> <?php  echo $category['name']; ?></option>
                     <?php endif; ?>
                    <?php endforeach; ?>
                </select>

            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Vendor</label>
                <select id="category" name="vendor_id" class="form-control">
                    <?php foreach (findAll('vendors') as $vendor ): ?>
                        <?php if ($product['category_id'] == $category['id']):?>
                            <option selected ="selected" value="<?php echo $vendor['id'] ?>"> <?php  echo $vendor['name']; ?></option>
                        <?php else: ?>
                            <option value="<?php echo $vendor['id'] ?>"> <?php  echo $vendor['name']; ?></option>
                        <?php endif; ?>
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

<?php
include "parts/footer.php";
?>
