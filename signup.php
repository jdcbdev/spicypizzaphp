<?php
    
    require_once './classes/customer.class.php';
    require_once  './tools/functions.php';

    if(isset($_POST['signup'])){

        $user = new Customer();
        //sanitize
        $user->firstname = htmlentities($_POST['firstname']);
        $user->middlename = htmlentities($_POST['middlename']);
        $user->lastname = htmlentities($_POST['lastname']);
        $user->email = htmlentities($_POST['email']);
        $user->password = htmlentities($_POST['password']);

        //validate
        if (validate_field($user->firstname) &&
        validate_field($user->lastname) &&
        validate_field($user->email) &&
        validate_field($user->password) &&
        validate_password($user->password) &&
        validate_cpw($user->password, $_POST['confirmpassword']) &&
        validate_email($user->email) && !$user->is_email_exist()){
            if($user->add()){
                $message = 'Account successfully created';
            }else{
                echo 'An error occured while adding in the database.';
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<?php
    $title = 'Sign Up';
    require_once('./include/head.php');
    require_once './tools/functions.php';
?>
<body>
    <?php
        require_once('./include/header.user.php');
    ?>
    <main>
        <section class="p-3 p-md-5">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                <?php
                    if(isset($_POST['signup']) && isset($message)){
                ?>
                        <div class="alert alert-success my-1 mb-3 text-center" role="alert">
                            <?= $message ?>
                        </div>
                <?php
                    }
                ?> 
                    <h1 class="h2 brand-color">Create an account</h1>
                    <h2 class="h6 mb-3">Sign up to order your favorite pizza.</h2>
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="firstname" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="firstname" name="firstname" value="<?php if(isset($_POST['firstname'])){ echo $_POST['firstname']; } ?>">
                            <?php
                                if(isset($_POST['firstname']) && !validate_field($_POST['firstname'])){
                            ?>
                                    <p class="text-danger my-1">First name is required</p>
                            <?php
                                }
                            ?>
                        </div>
                        <div class="mb-3">
                            <label for="middlename" class="form-label">Middle Name</label>
                            <input type="text" class="form-control" id="middlename" placeholder="Optional" name="middlename" value="<?php if(isset($_POST['middlename'])){ echo $_POST['middlename']; } ?>">
                        </div>
                        <div class="mb-3">
                            <label for="lastname" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" value="<?php if(isset($_POST['lastname'])){ echo $_POST['lastname']; } ?>">
                            <?php
                                if(isset($_POST['lastname']) && !validate_field($_POST['lastname'])){
                            ?>
                                    <p class="text-danger my-1">Last name is required</p>
                            <?php
                                }
                            ?>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php if(isset($_POST['email'])){ echo $_POST['email']; } ?>">
                            <?php
                               $new_user = new Customer();
                               if(isset($_POST['email'])){
                                    $new_user->email = htmlentities($_POST['email']);
                               }else{
                                    $new_user->email = '';
                               }

                                if(isset($_POST['email']) && strcmp(validate_email($_POST['email']), 'success') != 0){
                            ?>
                                    <p class="text-danger my-1"><?php echo validate_email($_POST['email']) ?></p>
                            <?php
                                }else if ($new_user->is_email_exist() && $_POST['email']){
                            ?>
                                    <p class="text-danger my-1">Email already exist</p>
                            <?php      
                                }
                            ?>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" value="<?php if(isset($_POST['password'])){ echo $_POST['password']; } ?>">
                            <?php
                                if(isset($_POST['password']) && validate_password($_POST['password']) !== "success"){
                            ?>
                                    <p class="text-danger my-1"><?= validate_password($_POST['password']) ?></p>
                            <?php
                                }
                            ?>
                        </div>
                        <div class="mb-3">
                            <label for="confirmpassword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" value="<?php if(isset($_POST['confirmpassword'])){ echo $_POST['confirmpassword']; } ?>">
                            <?php
                                if(isset($_POST['password']) && isset($_POST['confirmpassword']) && !validate_cpw($_POST['password'], $_POST['confirmpassword'])){
                            ?>
                                    <p class="text-danger my-1">Your confirm password didn't match</p>
                            <?php
                                }
                            ?>
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="signup" class="btn btn-primary brand-bg-color btn-create-account">Create account</button>
                        </div>
                    </form>
                    <div class="text-center mt-3">
                        <p>Already have an account? <a href="signin.php" class="brand-color text-decoration-none">Sign in</a></p>
                    </div>
                </div>
                <div class="d-none d-md-flex col-md-6 col-lg-8 ps-4 pt-3">
                    <div class="signup-banner w-100 h-100">
                    </div>
                </div>
            </div>
        </section>
        </div>
    </main>
    <?php
        require_once('./include/js.php')
    ?>
</body>
</html>