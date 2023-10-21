<!DOCTYPE html>
<html lang="en">
<?php
    $title = 'Staff';
    $staff_page = 'active';
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
                    <h2 class="h3 brand-color pt-3 pb-2">Staff</h2>
                    <div class="table-responsive overflow-hidden">
                        <div class="row g-2 mb-2 m-0">
                            <div id="MyButtons" class="d-flex mb-md-2 mb-lg-0 col-12 col-md-auto"></div>
                            <div class="form-group col-12 col-sm-auto flex-sm-grow-1 flex-lg-grow-0 ms-lg-auto">
                                <select name="staff-role" id="staff-role" class="form-select me-md-2">
                                    <option value="">All Roles</option>
                                    <option value="Manager">Manager</option>
                                    <option value="Staff">Staff</option>
                                    <option value="Cashier">Cashier</option>
                                </select>
                            </div>
                            <div class="form-group col-12 col-sm-auto flex-sm-grow-1 flex-lg-grow-0">
                                <select name="staff-status" id="staff-status" class="form-select me-md-2">
                                    <option value="">All Status</option>
                                    <option value="Active">Active</option>
                                    <option value="Deactivated">Deactivated</option>
                                </select>
                            </div>
                            <div class="search-keyword col-12 flex-lg-grow-0 d-flex">
                                <div class="input-group">
                                    <input type="text" name="keyword" id="keyword" placeholder="Search Staff" class="form-control">
                                    <button class="btn btn-outline-secondary brand-bg-color" type="button"><i class="fa fa-search color-white" aria-hidden="true"></i></button>
                                </div>
                                <button class="btn btn-outline-secondary btn-add" type="button" data-bs-toggle="modal" data-bs-target="#addStaffModal"><i class="fa fa-plus brand-color" aria-hidden="true"></i></button>
                            </div>
                        </div>
                        <div id="table-container">
                            <!-- The staff data will be loaded here via AJAX -->
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </main>
    <!-- Modal -->
    <div class="modal fade" id="addStaffModal" tabindex="-1" aria-labelledby="addStaffModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addStaffModalLabel">Add Staff Member</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="add_staff.php">
                        <div class="mb-2">
                            <label for="firstname" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="firstname" name="firstname" required>
                        </div>
                        <div class="mb-2">
                            <label for="lastname" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="staff-role" class="form-label">Role</label>
                            <select name="role" id="role" class="form-select">
                                <option value="">Select Role</option>
                                <option value="Manager">Manager</option>
                                <option value="Staff">Staff</option>
                                <option value="Cashier">Cashier</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-2">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="form-group mb-2">
                            <label class="form-label">Status</label>
                            <div class="d-flex">
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="statusActive" name="status" value="Active">
                                    <label class="form-check-label" for="statusActive">Active</label>
                                </div>
                                <div class="form-check ms-3">
                                    <input type="radio" class="form-check-input" id="statusDeactivated" name="status" value="Deactivated">
                                    <label class="form-check-label" for="statusDeactivated">Deactivated</label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2 brand-bg-color" id="addStaffButton">Add Staff</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
        require_once('../include/js.php')
    ?>
    <script src="../js/staff.js"></script>
</body>
</html>