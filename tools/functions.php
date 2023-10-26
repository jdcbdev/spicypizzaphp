<?php
    
    function validate_field($field){
        $field = htmlentities($field);
        if(strlen(trim($field))<1){
            return false;
        }else{
            return true;
        }
    }

    function validate_email($email){
        // Check if the 'email' key exists in the $_POST array
        if (isset($email)) {
            $email = trim($email); // Trim whitespace
    
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

    function validate_password($password) {
        $password = htmlentities($password);
        
        if (strlen(trim($password)) < 1) {
            return "Password cannot be empty";
        } elseif (strlen($password) < 8) {
            return "Password must be at least 8 characters long";
        } else {
            return "success"; // Indicates successful validation
        }
    }    

    function validate_cpw($password, $cpassword){
        $pw = htmlentities($password);
        $cpw = htmlentities($cpassword);
        if(strcmp($pw, $cpw) == 0){
            return true;
        }else{
            return false;
        }
    }

?>