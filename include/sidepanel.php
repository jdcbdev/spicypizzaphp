<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-white sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link <?= $dashboard_page ?>" aria-current="page" href="dashboard.php">
                    <i class="fa fa-tachometer" aria-hidden="true"></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $order_page ?>" href="#">
                    <i class="fa fa-file-text" aria-hidden="true"></i>
                    Orders
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $product_page ?>" href="products.php">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    Products
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $customer_page ?>" href="#">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    Customers
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $reports_page ?>" href="#">
                    <i class="fa fa-bar-chart" aria-hidden="true"></i>
                    Reports
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $staff_page ?>" href="staff.php">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    Staff
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $settings_page ?>" href="#">
                    <i class="fa fa-cog" aria-hidden="true"></i>
                    Settings
                </a>
            </li>
            <hr class="d-lg-none">
            <li class="nav-item d-lg-none">
                <a class="nav-link" href="#">
                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                    Logout
                </a>
            </li>
        </ul>
    </div>
</nav>