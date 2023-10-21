<?php
    
    function validate_fn($POST){
        $fn = htmlentities($POST['firstname']);
        if(strlen(trim($fn))<1){
            return false;
        }else{
            return true;
        }
    }

    function validate_ln($POST){
        $ln = htmlentities($POST['lastname']);
        if(strlen(trim($ln))<1){
            return false;
        }else{
            return true;
        }
    }

    function validate_email($POST){
        // Check if the 'email' key exists in the $_POST array
        if (isset($POST['email'])) {
            $email = trim($POST['email']); // Trim whitespace
    
            // Check if the email is not empty
            if (empty($email)) {
                return false;
            } else {
                // Check if the email has a valid format
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    return true; // Email is valid
                } else {
                    return false; // Email is not valid
                }
            }
        } else {
            return false; // 'email' key doesn't exist in $_POST
        }
    }    

    function validate_password($POST){
        $password = htmlentities($POST['password']);
        if(strlen(trim($password))<1){
            return false;
        }else{
            return true;
        }
    }

    function validate_cpw($POST){
        $pw = htmlentities($POST['password']);
        $cpw = htmlentities($POST['confirmpassword']);
        if(strcmp($pw, $cpw) == 0){
            return true;
        }else{
            return false;
        }
    }

?>