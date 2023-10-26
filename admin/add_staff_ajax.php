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
        $status = htmlentities($_POST['status']);

        // empty error
        $error_array = array();

        // Validate
        if (!validate_fn($_POST)) {
            $error_array['firstname'] = "Please enter a valid first name";
        }

        if (!validate_ln($_POST)) {
            $error_array['lastname'] = "Please enter a valid last name";
        }

        if (!validate_staffrole($_POST)) {
            $error_array['role'] = "Please select role";
        }

        if (!validate_email($_POST)) {
            $error_array['email'] = "Please enter a valid email";
        }

        if (!validate_password($_POST)) {
            $error_array['password'] = "Please enter a valid password";
        }

        if (!validate_staffstatus($_POST)) {
            $error_array['status'] = "Please select status";
        }

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
                echo json_encode(["status" => "success"]);
            } else {
                echo json_encode(["status" => "Failed to add staff."]);
            }
        }else{
            // Validation errors occurred, send error messages to JavaScript
            echo json_encode(["errors" => $error_array]);
        }
    }

?>