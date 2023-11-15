<?php
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
    //if the above code is false then html below will be displayed
?>
<!DOCTYPE html>
<html lang="en">
<?php
    $title = 'Dashboard';
    $dashboard_page = 'active';
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
                    <h1 class="h3 brand-color pt-3">Overview</h1>
                    <div class="row py-2 py-lg-3">
                        <!-- Statistic Card 1 -->
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 pb-2 pb-lg-0">
                            <div class="card admin-rounded">
                                <div class="card-body">
                                    <h5 class="card-title">Pending Orders</h5>
                                    <p class="card-text"><i class="fa fa-users"></i> 1,000</p>
                                </div>
                            </div>
                        </div>
                        <!-- Statistic Card 2 -->
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 pb-2 pb-lg-0">
                            <div class="card admin-rounded">
                                <div class="card-body">
                                    <h5 class="card-title">Total Orders</h5>
                                    <p class="card-text"><i class="fa fa-shopping-cart"></i> 500</p>
                                </div>
                            </div>
                        </div>
                        <!-- Statistic Card 3 -->
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 pb-2 pb-lg-0">
                            <div class="card admin-rounded">
                                <div class="card-body">
                                    <h5 class="card-title">Revenue</h5>
                                    <p class="card-text"><i class="fa fa-money" aria-hidden="true"></i> &#8369;10,000</p>
                                </div>
                            </div>
                        </div>
                        <!-- Statistic Card 4 -->
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 pb-2 pb-lg-0">
                            <div class="card admin-rounded">
                                <div class="card-body">
                                    <h5 class="card-title">Products</h5>
                                    <p class="card-text"><i class="fa fa-cubes"></i> 200</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h2 class="h3 brand-color">New Orders</h2>
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Customer Name</th>
                                    <th scope="col">Order Summary</th>
                                    <th scope="col">Total Items</th>
                                    <th scope="col">Total (₱)</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>2023-10-15</td>
                                    <td>John Doe</td>
                                    <td>Spicy Pizza with Jalapenos</td>
                                    <td>2</td>
                                    <td>₱800.00</td>
                                    <td>Delivered</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>2023-10-16</td>
                                    <td>Jane Smith</td>
                                    <td>Spicy Margherita Pizza</td>
                                    <td>1</td>
                                    <td>₱625.00</td>
                                    <td>Processing</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>2023-10-17</td>
                                    <td>Mike Johnson</td>
                                    <td>Spicy Chicken Pizza</td>
                                    <td>3</td>
                                    <td>₱1,150.00</td>
                                    <td>Pending</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>2023-10-18</td>
                                    <td>Lisa Anderson</td>
                                    <td>Spicy Veggie Pizza</td>
                                    <td>2</td>
                                    <td>₱950.00</td>
                                    <td>Delivered</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>2023-10-19</td>
                                    <td>Robert Green</td>
                                    <td>Spicy Pepperoni Pizza</td>
                                    <td>1</td>
                                    <td>₱520.00</td>
                                    <td>Processing</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>2023-10-20</td>
                                    <td>Susan Taylor</td>
                                    <td>Spicy BBQ Chicken Pizza</td>
                                    <td>4</td>
                                    <td>₱1,400.00</td>
                                    <td>Pending</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>2023-10-21</td>
                                    <td>William Brown</td>
                                    <td>Spicy Hawaiian Pizza</td>
                                    <td>2</td>
                                    <td>₱900.00</td>
                                    <td>Processing</td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>2023-10-22</td>
                                    <td>Mary Johnson</td>
                                    <td>Spicy Supreme Pizza</td>
                                    <td>3</td>
                                    <td>₱1,250.00</td>
                                    <td>Delivered</td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td>2023-10-23</td>
                                    <td>James Wilson</td>
                                    <td>Spicy Meat Lovers Pizza</td>
                                    <td>2</td>
                                    <td>₱1,100.00</td>
                                    <td>Processing</td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>2023-10-24</td>
                                    <td>Emily Davis</td>
                                    <td>Spicy Veggie Delight Pizza</td>
                                    <td>1</td>
                                    <td>₱600.00</td>
                                    <td>Pending</td>
                                </tr>
                                <!-- You now have a total of 10 rows with spicy pizza orders -->
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
    <script src="../js/dashboard.js"></script>
</body>
</html>