<!DOCTYPE html>
<html lang="en">
<?php
    $title = 'Products';
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
                    <h2 class="h3 brand-color pt-3 pb-2">Products</h2>
                    <div class="table-responsive overflow-hidden">
                        <div class="row g-2 mb-2 m-0">
                            <div id="MyButtons" class="d-flex mb-md-2 mb-lg-0 col-12 col-md-auto"></div>
                            <div class="form-group col-12 col-sm-auto flex-sm-grow-1 flex-lg-grow-0 ms-lg-auto">
                                <select name="product-category" id="product-category" class="form-select me-md-2">
                                    <option value="">All Category</option>
                                    <option value="Pizza">Pizza</option>
                                    <option value="Refreshment">Refreshment</option>
                                </select>
                            </div>
                            <div class="form-group col-12 col-sm-auto flex-sm-grow-1 flex-lg-grow-0">
                                <select name="product-availability" id="product-availability" class="form-select me-md-2">
                                    <option value="">All Availability</option>
                                    <option value="In Stock">In Stock</option>
                                    <option value="Out of Stock">Out of Stock</option>
                                </select>
                            </div>
                            <div class="search-keyword col-12 flex-lg-grow-0 d-flex">
                                <div class="input-group">
                                    <input type="text" name="keyword" id="keyword" placeholder="Search Product" class="form-control">
                                    <button class="btn btn-outline-secondary brand-bg-color" type="button"><i class="fa fa-search color-white" aria-hidden="true"></i></button>
                                </div>
                                <button class="btn btn-outline-secondary btn-add" type="button"><i class="fa fa-plus brand-color" aria-hidden="true"></i></button>
                            </div>
                        </div>
                        <table id="products" class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Pizza Name</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Price (PHP)</th>
                                    <th scope="col">Availability</th>
                                    <th scope="col" width="5%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $pizzaArray = array(
                                    array(
                                        'name' => 'Margherita Pizza',
                                        'category' => 'Pizza',
                                        'price' => '220.00',
                                        'availability' => 'In Stock'
                                    ),
                                    
                                    array(
                                        'name' => 'Pepperoni Pizza',
                                        'category' => 'Pizza',
                                        'price' => '250.00',
                                        'availability' => 'Out of Stock'
                                    ),
                                    
                                    array(
                                        'name' => 'Hawaiian Pizza',
                                        'category' => 'Pizza',
                                        'price' => '280.00',
                                        'availability' => 'In Stock'
                                    ),
                                    
                                    array(
                                        'name' => 'Mushroom Pizza',
                                        'category' => 'Pizza',
                                        'price' => '240.00',
                                        'availability' => 'In Stock'
                                    ),
                                    
                                    array(
                                        'name' => 'Soda',
                                        'category' => 'Refreshment',
                                        'price' => '50.00',
                                        'availability' => 'In Stock'
                                    ),
                                    
                                    array(
                                        'name' => 'Lemonade',
                                        'category' => 'Refreshment',
                                        'price' => '60.00',
                                        'availability' => 'Out of Stock'
                                    ),
                                    
                                    array(
                                        'name' => 'Iced Tea',
                                        'category' => 'Refreshment',
                                        'price' => '55.00',
                                        'availability' => 'In Stock'
                                    ),
                                    
                                    array(
                                        'name' => 'Pineapple Juice',
                                        'category' => 'Refreshment',
                                        'price' => '70.00',
                                        'availability' => 'In Stock'
                                    ),
                                    
                                    array(
                                        'name' => 'BBQ Chicken Pizza',
                                        'category' => 'Pizza',
                                        'price' => '270.00',
                                        'availability' => 'Out of Stock'
                                    ),
                                    
                                    array(
                                        'name' => 'Water',
                                        'category' => 'Refreshment',
                                        'price' => '20.00',
                                        'availability' => 'In Stock'
                                    ),                                    
                                );
                            ?>
                            <?php
                                $counter = 1;
                                foreach ($pizzaArray as $item){
                            ?>
                                <tr>
                                    <td><?= $counter ?></td>
                                    <td><?= $item['name'] ?></td>
                                    <td><?= $item['category'] ?></td>
                                    <td><?= '₱' . number_format($item['price'], 2) ?></td>
                                    <td><?= $item['availability'] ?></td>
                                    <td class="text-center"><a href=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                                </tr>
                            <?php
                                    $counter++;
                                }
                            ?>  
                            </tbody>
                        </table>

                    </div>
                </main>
            </div>
        </div>
    </main>
    <?php
        require_once('../include/js.php')
    ?>
    <script src="../js/products.js"></script>
</body>
</html>