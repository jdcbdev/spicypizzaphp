<?php

    require_once '../classes/staff.class.php';
    require_once '../tools/functions.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Collect data from the AJAX request
        $firstname = htmlentities($_POST['firstname']);
        $lastname = htmlentities($_POST['lastname']);
        $role = htmlentities($_POST['role']);
        $email = htmlentities($_POST['email']);
        $password = htmlentities($_POST['password']);
        //if status is a radio button
        if(isset($_POST['status'])){
            $status = htmlentities($_POST['status']);
        }else{
            $status = '';
        }

        // Initialize an error array to store validation errors
        $error_array = [];

        // Validate
        if (!validate_field($firstname)) {
            $error_array['firstname'] = "Please enter a valid first name";
        }

        if (!validate_field($lastname)) {
            $error_array['lastname'] = "Please enter a valid last name";
        }

        if (!validate_field($role)) {
            $error_array['role'] = "Please select staff role";
        }

        if (!validate_email($email)) {
            $error_array['email'] = "Please enter a valid email";
        }

        if (!validate_field($password)) {
            $error_array['password'] = "Please enter a valid password";
        }

        if (!validate_field($status)) {
            $error_array['status'] = "Please select staff status";
        }

        header('Content-Type: application/json');
        
        if (empty($error_array)) {
            // No validation errors, proceed to add staff
            $staff = new Staff();
            $staff->firstname = $firstname;
            $staff->lastname = $lastname;
            $staff->role = $role;
            $staff->email = $email;
            $staff->password = $password;
            $staff->status = $status;

            if ($staff->add()) {
                $message = 'success';
                echo json_encode($message);
            } else {
                $message = 'Failed adding to the database';
                echo json_encode($message);
            }
        }else{
            // Validation errors occurred, send error messages to JavaScript
            echo json_encode($error_array);
        }
    }

?>