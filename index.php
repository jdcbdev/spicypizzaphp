<!DOCTYPE html>
<html lang="en">
<?php
    $title = 'Home';
    require_once('./include/head.php');
?>
<body>
    <?php
        require_once('./include/header.user.php');
    ?>
    <main>
        <section class="banner p-5">
            <h2>The First Spicy Pizza in Town</h2>
            <h2><span class="spicy">Spicy Flavors.</span> <span class="tasty">Tasty Pizza.</span></h2>
            <a href="#" class="btn btn-primary btn-lg btn-order mt-3">Order Now</a>
        </section>
        <section class="container best-seller my-4">
            <div class="text-center mb-4">
                <h2>- Best Seller -</h2>
            </div>
            <div class="row">
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <a class="add-to-cart">
                        <img src="./img/bestseller/1.jpg" class="img-fluid" alt="">
                        <button type="button" class="btn btn-primary btn-add-to-cart brand-bg-color">Add to Cart</button>
                    </a>
                    <p class="text-center my-1">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </p>
                    <p class="text-center my-1">Product Name</p>
                    <p class="text-center my-1">Product Price</p>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <a class="add-to-cart">
                        <img src="./img/bestseller/2.jpg" class="img-fluid" alt="">
                        <button type="button" class="btn btn-primary btn-add-to-cart brand-bg-color">Add to Cart</button>
                    </a>
                    <p class="text-center my-1">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </p>
                    <p class="text-center my-1">Product Name</p>
                    <p class="text-center my-1">Product Price</p>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <a class="add-to-cart">
                        <img src="./img/bestseller/3.jpg" class="img-fluid" alt="">
                        <button type="button" class="btn btn-primary btn-add-to-cart brand-bg-color">Add to Cart</button>
                    </a>
                    <p class="text-center my-1">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </p>
                    <p class="text-center my-1">Product Name</p>
                    <p class="text-center my-1">Product Price</p>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <a class="add-to-cart">
                        <img src="./img/bestseller/4.jpg" class="img-fluid" alt="">
                        <button type="button" class="btn btn-primary btn-add-to-cart brand-bg-color">Add to Cart</button>
                    </a>
                    <p class="text-center my-1">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </p>
                    <p class="text-center my-1">Product Name</p>
                    <p class="text-center my-1">Product Price</p>
                </div>
            </div>
        </section>
        <section class="slogan-banner">
            <img src="./img/banner/1.jpg" alt="" class="img-fluid">
        </section>
        </div>
    </main>
    <?php
        require_once('./include/js.php')
    ?>
    <script src="./js/landing-page.js"></script>
</body>
</html>