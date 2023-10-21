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
                    <h1 class="h2 brand-color">Create an account</h1>
                    <h2 class="h6 mb-3">Sign up to order your favorite pizza.</h2>
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="firstName" name="firstName" value="<?php if(isset($_POST['firstName'])){ echo $_POST['firstName']; } ?>">
                            <?php
                                if(isset($_POST['firstName']) && !validate_fn($_POST)){
                            ?>
                                    <p class="text-danger my-1">Please enter a valid first name</p>
                            <?php
                                }
                            ?>
                        </div>
                        <div class="mb-3">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lastName" name="lastName" value="<?php if(isset($_POST['lastName'])){ echo $_POST['lastName']; } ?>">
                            <?php
                                if(isset($_POST['lastName']) && !validate_ln($_POST)){
                            ?>
                                    <p class="text-danger my-1">Please enter a valid last name</p>
                            <?php
                                }
                            ?>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php if(isset($_POST['email'])){ echo $_POST['email']; } ?>">
                            <?php
                                if(isset($_POST['email']) && !validate_email($_POST)){
                            ?>
                                    <p class="text-danger my-1">Please enter a valid email</p>
                            <?php
                                }
                            ?>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" value="<?php if(isset($_POST['password'])){ echo $_POST['password']; } ?>">
                            <?php
                                if(isset($_POST['password']) && !validate_password($_POST)){
                            ?>
                                    <p class="text-danger my-1">Please enter a valid password</p>
                            <?php
                                }
                            ?>
                        </div>
                        <div class="mb-3">
                            <label for="confirmPassword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" value="<?php if(isset($_POST['confirmPassword'])){ echo $_POST['confirmPassword']; } ?>">
                            <?php
                                if(isset($_POST['password']) && isset($_POST['confirmPassword']) && !validate_cpw($_POST)){
                            ?>
                                    <p class="text-danger my-1">Your confirm password didn't match</p>
                            <?php
                                }
                            ?>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary brand-bg-color btn-create-account">Create account</button>
                        </div>
                    </form>
                    <div class="text-center mt-3">
                        <p>Already have an account? <a href="" class="brand-color">Sign in here</a></p>
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