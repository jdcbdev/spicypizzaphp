<?php
    
    require_once '../classes/staff.class.php';
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
        $staff = new Staff();
        $record = $staff->fetch($_GET['id']);
        $staff->firstname = $record['firstname'];
        $staff->lastname = $record['lastname'];
        $staff->role = $record['role'];
        $staff->email = $record['email'];
        $staff->status = $record['status'];
        // this will be used to check if the old email is also the same with the current email
        // subsequently, this is use to check if the email already exist
        $old_email = $staff->email;
    }

    //if the above code is false then html below will be displayed

    if(isset($_POST['save'])){

        $staff = new Staff();
        //sanitize
        $staff->id = $_GET['id'];
        $staff->firstname = htmlentities($_POST['firstname']);
        $staff->lastname = htmlentities($_POST['lastname']);
        $staff->role = htmlentities($_POST['role']);
        $staff->email = htmlentities($_POST['email']);
        if(isset($_POST['status'])){
            $staff->status = htmlentities($_POST['status']);
        }else{
            $staff->status = '';
        }

        //validate
        if (validate_field($staff->firstname) &&
        validate_field($staff->lastname) &&
        validate_field($staff->role) &&
        validate_field($staff->email) &&
        validate_field($staff->status) &&
        //validate if email is a valid format
        validate_email($staff->email) == 'success' &&
        !($staff->is_email_exist() && $old_email != $staff->email)){
            if($staff->edit()){
                header('location: staff.php');
            }else{
                echo 'An error occured while adding in the database.';
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<?php
    $title = 'Edit Staff';
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
                    <div class="col-12 col-lg-6 d-flex justify-content-between align-items-center">
                        <h2 class="h3 brand-color pt-3 pb-2">Edit Staff</h2>
                        <a href="staff.php" class="text-primary text-decoration-none"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
                    </div>
                    <div class="col-12 col-lg-6">
                        <form method="post" action="">
                            <div class="mb-2">
                                <label for="firstname" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="firstname" name="firstname" required value="<?php if(isset($_POST['firstname'])) { echo $_POST['firstname']; } else if(isset($staff->firstname)){ echo $staff->firstname; } ?>">
                                <?php
                                    if(isset($_POST['firstname']) && !validate_field($_POST['firstname'])){
                                ?>
                                        <p class="text-danger my-1">First name is required</p>
                                <?php
                                    }
                                ?>
                            </div>
                            <div class="mb-2">
                                <label for="lastname" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="lastname" name="lastname" required value="<?php if(isset($_POST['lastname'])) { echo $_POST['lastname']; } else if(isset($staff->lastname)){ echo $staff->lastname; } ?>">
                                <?php
                                    if(isset($_POST['lastname']) && !validate_field($_POST['lastname'])){
                                ?>
                                        <p class="text-danger my-1">Last name is required</p>
                                <?php
                                    }
                                ?>
                            </div>
                            <div class="form-group mb-2">
                                <label for="staff-role" class="form-label">Role</label>
                                <select name="role" id="role" class="form-select">
                                    <option value="">Select Role</option>
                                    <option value="Manager" <?php if(isset($_POST['role']) && $_POST['role'] == 'Manager') { echo 'selected'; } else if(isset($staff->role) && $staff->role == 'Manager'){ echo 'selected'; } ?>>Manager</option>
                                    <option value="Staff" <?php if(isset($_POST['role']) && $_POST['role'] == 'Staff') { echo 'selected'; } else if(isset($staff->role) && $staff->role == 'Staff'){ echo 'selected'; } ?>>Staff</option>
                                    <option value="Cashier" <?php if(isset($_POST['role']) && $_POST['role'] == 'Cashier') { echo 'selected'; } else if(isset($staff->role) && $staff->role == 'Cashier'){ echo 'selected'; } ?>>Cashier</option>
                                </select>
                                <?php
                                    if(isset($_POST['role']) && !validate_field($_POST['role'])){
                                ?>
                                        <p class="text-danger my-1">Select staff role</p>
                                <?php
                                    }
                                ?>
                            </div>
                            <div class="mb-2">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required value="<?php if(isset($_POST['email'])) { echo $_POST['email']; } else if(isset($staff->email)){ echo $staff->email; } ?>">
                                <?php
                                    $new_staff = new Staff();
                                    if(isset($_POST['email'])){
                                         $new_staff->email = htmlentities($_POST['email']);
                                    }else{
                                         $new_staff->email = '';
                                    }

                                    if(isset($_POST['email']) && strcmp(validate_email($_POST['email']), 'success') != 0){
                                ?>
                                        <p class="text-danger my-1"><?php echo validate_email($_POST['email']) ?></p>
                                <?php
                                    }else if ($new_staff->is_email_exist() && $_POST['email'] && $old_email != $staff->email){
                                ?>
                                        <p class="text-danger my-1">Email already exist</p>
                                <?php      
                                    }
                                ?>
                            </div>
                            <div class="form-group mb-2">
                                <label class="form-label">Status</label>
                                <div class="d-flex">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="statusActive" name="status" value="Active" <?php if(isset($_POST['status']) && $_POST['status'] == 'Active') { echo 'checked'; } else if(isset($staff->status) && $staff->status == 'Active'){ echo 'checked'; } ?>>
                                        <label class="form-check-label" for="statusActive">Active</label>
                                    </div>
                                    <div class="form-check ms-3">
                                        <input type="radio" class="form-check-input" id="statusDeactivated" name="status" value="Deactivated" <?php if(isset($_POST['status']) && $_POST['status'] == 'Deactivated') { echo 'checked'; } else if(isset($staff->status) && $staff->status == 'Deactivated'){ echo 'checked'; } ?>>
                                        <label class="form-check-label" for="statusDeactivated">Deactivated</label>
                                    </div>
                                </div>
                                <?php
                                    if((!isset($_POST['status']) && isset($_POST['save'])) || (isset($_POST['status']) && !validate_field($_POST['status']))){
                                ?>
                                        <p class="text-danger my-1">Select staff status</p>
                                <?php
                                    }
                                ?>
                            </div>
                            <button type="submit" name="save" class="btn btn-primary mt-2 mb-3 brand-bg-color">Save Staff</button>
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