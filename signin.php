<?php
    //resume session here to fetch session values
    session_start();
    /*
        if user is login then redirect to authenticated page
    */
    if (isset($_SESSION['user']) && $_SESSION['user'] == 'customer'){
        header('location: ./index.php');
    }

    //if the login button is clicked
    require_once('./classes/account.class.php');
    
    if (isset($_POST['login'])) {
        $account = new Account();
        $account->email = htmlentities($_POST['email']);
        $account->password = htmlentities($_POST['password']);
        if ($account->sign_in_customer()){
            $_SESSION['user'] = 'customer';
            header('location: ./index.php');
        }else{
            $error =  'Invalid email/password. Try again.';
        }
    }
    
    //if the above code is false then html below will be displayed
?>

<!DOCTYPE html>
<html lang="en">
<?php
    $title = 'Sign In';
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
                    <h1 class="h2 brand-color">Welcome Back</h1>
                    <h2 class="h6 mb-3">Welcome back! Please enter your credentials.</h2>
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php if(isset($_POST['email'])){ echo $_POST['email']; } ?>">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" value="<?php if(isset($_POST['password'])){ echo $_POST['password']; } ?>">
                        </div>
                        <div class="mb-3">
                            <p class="text-end"><a href="">Forgot Password?</a></p>
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="login" class="btn btn-primary brand-bg-color btn-create-account">Login</button>
                        </div>
                        <?php
                        if (isset($_POST['login']) && isset($error)){
                        ?>
                            <p class="text-danger mt-3 text-center"><?= $error ?></p>
                        <?php
                        }
                        ?>
                    </form>
                    <div class="text-center mt-3">
                        <p>Don’t have account yet? Sign up here <a href="signup.php" class="brand-color text-decoration-none">Sign up</a></p>
                    </div>
                </div>
                <div class="d-none d-md-flex col-md-6 col-lg-8 ps-4 pt-3">
                    <div class="signin-banner w-100 h-100">
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