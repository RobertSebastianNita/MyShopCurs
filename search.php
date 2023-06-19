<?php
include "parts/header.php";

$query = "SELECT * FROM products";
$filters=[];

if(isset($_GET['search'])){
    $search = $_GET['search'];
    $filters = "name LIKE'%$search%' OR description LIKE '%$search%'";
}

if(isset($_GET['vendor'])) {
    $vendorIds = $_GET['vendor'];
    $vendorFilter= [];
    foreach ($vendorIds as $vendorId) {
        $vendorFilter[]= "vendor_id=$vendorId";
    }
    if(count($vendorFilter)>0){
        $filters[]=   '('.implode(' OR ', $vendorFilter).')';
    }
}
if(isset($_GET['category'])) {
    $categoryIds = $_GET['category'];
    $categoryFilter= [];
    foreach ($categoryIds as $categoryId) {
        $categoryFilter[]= "category_id=$categoryId";
    }
    if(count($categoryFilter)>0){
        $filters[]=   '('.implode(' OR ', $categoryFilter).')';
    }
}
if(isset($_GET['price_range'])) {
    $priceRanges = $_GET['price_range'];
    $priceRangeFilter = [];
    if(in_array("1..100", $priceRanges)){
        $priceRangeFilter[] = "price >= 1 AND price <=100";
    }
    if(in_array("100..200", $priceRanges)){
        $priceRangeFilter[] = "price > 100 AND price <=200";
    }
    if(in_array("200..300", $priceRanges)){
        $priceRangeFilter[] = "price > 200 AND price <=300";
    }
    if(in_array("300..1000", $priceRanges)){
        $priceRangeFilter[] = "price > 300 AND price <=1000";
    }
    if(count($priceRangeFilter)>0){
        $filters[]=   '('.implode(' OR ', $priceRangeFilter).')';
    }
}
if(count($filters)>0) {
    $filterString = implode(' AND ', $filters);
    $query .= ' WHERE '.$filterString;
}
$searchedProducts = query($query);
$products= [];
foreach ($searchedProducts as $searchedProduct) {
    $products[] = new Product($searchedProduct['id']);
}
?>
<div class="container mt-5">
    <form method="get" action="search.php" >
        <div class="row">
            <div class="col-3 mt-5">
                <h2>Vendors</h2>
                <?php $vendors = Vendor::findAll(); ?>
                <?php foreach ($vendors as $vendor): ?>
                      <input type="checkbox"
                       <?php
                          if(isset($vendorIds) && in_array($vendor->getId(), $vendorIds)):
                        ?>
                          checked="checked"
                          <?php endif;?>
                      name="vendor[]" value="<?php echo $vendor->getId();?>"/><?php  echo $vendor->name; ?> <br/>
                 <?php endforeach; ?>
            </div>
            <div class="col-3 mt-5">
                <h2>Categories</h2>
                <?php $categories = Category::findAll(); ?>
                <?php foreach ($categories as $category): ?>
                    <input type="checkbox"
                    <?php
                    if(isset($categoryIds) && in_array($category->getId(), $categoryIds)):
                        ?>
                        checked="checked"
                    <?php endif;?>
                           name="vendor[]" value="<?php echo $category->getId();?>"/><?php  echo $category->name; ?> <br/>
                <?php endforeach; ?>
            </div>
            <div class="col-3 mt-5">
                <h2>Price</h2>
                <input type="checkbox"
                    <?php
                    if(isset($priceRanges) && in_array("1..100", $priceRanges)):
                        ?>
                        checked="checked"
                    <?php endif;?>
                       name="price_range[]" value="1..100"/>1..100 <br/>
                <input type="checkbox"
                    <?php
                    if(isset($priceRanges) && in_array("100..200", $priceRanges)):
                        ?>
                        checked="checked"
                    <?php endif;?>
                       name="price_range[]" value="100..200"/>100..200 <br/>
                <input type="checkbox"
                    <?php
                    if(isset($priceRanges) && in_array("200..300", $priceRanges)):
                        ?>
                        checked="checked"
                    <?php endif;?>
                       name="price_range[]" value="200..300"/>1..100 <br/>
                <input type="checkbox"
                    <?php
                    if(isset($priceRanges) && in_array("300..1000", $priceRanges)):
                        ?>
                        checked="checked"
                    <?php endif;?>
                       name="price_range[]" value="300..1000"/>300..1000 <br/>
                <input type="checkbox"
                    <?php
                    if(isset($priceRanges) && in_array("1..100", $priceRanges)):
                        ?>
                        checked="checked"
                    <?php endif;?>
                       name="price_range[]" value="1..100"/>1..100 <br/>
            </div>
            <div class="col-3 mt-5">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col-12 mt-5">
            <h2>Cauta</h2>
        </div>
       <?php
         // afisam cardurile de produse
       foreach ($products as $product) {
           $product ->card();
       }
       ?>
    </div>
</div>

<?php
include "parts/footer.php";
?>