<?php
    //resume session here to fetch session values
    session_start();
    /*
        if user is login then redirect to dashboard page
    */
    if (isset($_SESSION['user']) && $_SESSION['user'] == 'employee'){
        header('location: ./dashboard.php');
    }

    //if the login button is clicked
    require_once('../classes/account.class.php');
    
    if (isset($_POST['login'])) {
        $account = new Account();
        $account->email = htmlentities($_POST['email']);
        $account->password = htmlentities($_POST['password']);
        if ($account->sign_in_staff()){
            $_SESSION['user'] = 'employee';
            header('location: ./dashboard.php');
        }else{
            $error =  'Invalid email/password. Try again.';
        }
    }
    
    //if the above code is false then html below will be displayed
?>
<!DOCTYPE html>
<html lang="en">
<?php
    $title = 'Staff Login';
    require_once('../include/head.php');
?>
<body>
    <main>
        <div class="container-fluid vh-100 d-flex justify-content-center align-items-center">
            <div class="admin-login-page p-4">
                <p class="text-center">
                    <img src="../img/logo1.png" class="img-fluid" alt="">
                </p>
                <h1 class="h2 my-3 mb-4 text-center brand-color">Admin Login</h1>
                <form method="post" action="">
                    <div class="mb-2">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" required value="<?php if(isset($_POST['email'])) { echo $_POST['email']; } ?>">
                    </div>
                    <div class="mb-2">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required value="<?php if(isset($_POST['password'])) { echo $_POST['password']; } ?>">
                    </div>
                    <button type="submit" class="btn btn-primary mt-2 brand-bg-color w-100" name="login">Login</button>
                    
                    <?php
                    if (isset($_POST['login']) && isset($error)){
                    ?>
                        <p class="text-danger mt-3 text-center"><?= $error ?></p>
                    <?php
                    }
                    ?>
                </form>
            </div>
        </div>
    </main>
</body>
</html>