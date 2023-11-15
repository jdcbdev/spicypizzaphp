<?php
    
    require_once '../classes/products.class.php';
    require_once  '../tools/functions.php';

    //resume session here to fetch session values
    session_start();
    /*
        if user is not login then redirect to login page,
        this is to prevent users from accessing pages that requires
        authentication such as the dashboard
    */
    if (!isset($_SESSION['user']) || $_SESSION['user'] != 'employee'){
        header('location: ./index.php');
    }

    if(isset($_GET['id'])){
        $product = new Products();
        $record = $product->fetch($_GET['id']);
        $product->productname = $record['productname'];
        $product->category = $record['category'];
        $product->price = $record['price'];
        $product->availability = $record['availability'];
    }
    
    //if the above code is false then html below will be displayed

    if(isset($_POST['save'])){

        $product = new Products();
        //sanitize
        $product->id = $_GET['id'];
        $product->productname = htmlentities($_POST['productname']);
        $product->category = htmlentities($_POST['category']);
        $product->price = htmlentities($_POST['price']);
        if(isset($_POST['availability'])){
            $product->availability = htmlentities($_POST['availability']);
        }else{
            $product->availability = '';
        }

        //validate
        if (validate_field($product->productname) &&
        validate_field($product->category) &&
        validate_field($product->price) &&
        validate_field($product->availability)){
            if($product->edit()){
                header('location: products.php');
            }else{
                echo 'An error occured while adding in the database.';
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<?php
    $title = 'Edit Product';
    $product_page = 'active';
    require_once('../include/head.php');
?>
<body>
    <?php
        require_once('../include/header.admin.php')
    ?>
    <main>
        <div class="container-fluid">
            <div class="row">
                <?php
                    require_once('../include/sidepanel.php')
                ?>
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    <div class="col-12 col-lg-6 d-flex justify-content-between align-items-center">
                        <h2 class="h3 brand-color pt-3 pb-2">Edit Product</h2>
                        <a href="products.php" class="text-primary text-decoration-none"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
                    </div>
                    <div class="col-12 col-lg-6">
                        <form method="post" action="">
                            <div class="mb-2">
                                <label for="productname" class="form-label">Product Name</label>
                                <input type="text" class="form-control" id="productname" name="productname" required value="<?php if(isset($_POST['productname'])) { echo $_POST['productname']; } else if(isset($product->productname)){ echo $product->productname; } ?>">
                                <?php
                                    if(isset($_POST['productname']) && !validate_field($_POST['productname'])){
                                ?>
                                        <p class="text-danger my-1">Product name is required</p>
                                <?php
                                    }
                                ?>
                            </div>
                            <div class="form-group mb-2">
                                <label for="category" class="form-label">Category</label>
                                <select name="category" id="category" class="form-select">
                                    <option value="">Select Category</option>
                                    <option value="Pizza" <?php if(isset($_POST['category']) && $_POST['category'] == 'Pizza') { echo 'selected'; } else if(isset($product->category) && $product->category == 'Pizza'){ echo 'selected'; } ?>>Pizza</option>
                                    <option value="Drinks" <?php if(isset($_POST['category']) && $_POST['category'] == 'Drinks') { echo 'selected'; } else if(isset($product->category) && $product->category == 'Drinks'){ echo 'selected'; } ?>>Drinks</option>
                                    <option value="Hamburger" <?php if(isset($_POST['category']) && $_POST['category'] == 'Hamburger') { echo 'selected'; } else if(isset($product->category) && $product->category == 'Hamburger'){ echo 'selected'; } ?>>Hamburger</option>
                                </select>
                                <?php
                                    if(isset($_POST['category']) && !validate_field($_POST['category'])){
                                ?>
                                        <p class="text-danger my-1">Select product category</p>
                                <?php
                                    }
                                ?>
                            </div>
                            <div class="mb-2">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" step="any" class="form-control" id="price" name="price" required value="<?php if(isset($_POST['price'])) { echo $_POST['price']; } else if(isset($product->price)){ echo $product->price; } ?>">
                                <?php
                                    if(isset($_POST['price']) && !validate_field($_POST['price'])){
                                ?>
                                        <p class="text-danger my-1">Price is required</p>
                                <?php
                                    }
                                ?>
                            </div>
                            <div class="form-group mb-2">
                                <label class="form-label">Availability</label>
                                <div class="d-flex">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="inStock" name="availability" value="In Stock" <?php if(isset($_POST['availability']) && $_POST['availability'] == 'In Stock') { echo 'checked'; } else if(isset($product->availability) && $product->availability == 'In Stock'){ echo 'checked'; } ?>>
                                        <label class="form-check-label" for="inStock">In Stock</label>
                                    </div>
                                    <div class="form-check ms-3">
                                        <input type="radio" class="form-check-input" id="outStock" name="availability" value="Out of Stock" <?php if(isset($_POST['availability']) && $_POST['availability'] == 'Out of Stock') { echo 'checked'; } else if(isset($product->availability) && $product->availability == 'Out of Stock'){ echo 'checked'; } ?>>
                                        <label class="form-check-label" for="outStock">Out of Stock</label>
                                    </div>
                                </div>
                                <?php
                                    if((!isset($_POST['availability']) && isset($_POST['save'])) || (isset($_POST['availability']) && !validate_field($_POST['availability']))){
                                ?>
                                        <p class="text-danger my-1">Select availability of the product</p>
                                <?php
                                    }
                                ?>
                            </div>
                            <button type="submit" name="save" class="btn btn-primary mt-2 mb-3 brand-bg-color">Save Product</button>
                        </form>
                    </div>
                </main>
            </div>
        </div>
    </main>
    <?php
        require_once('../include/js.php')
    ?>
</body>
</html>