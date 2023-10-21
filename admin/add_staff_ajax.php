<?php

    require_once '../classes/staff.class.php';
    require_once '../tools/functions.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Collect data from the AJAX request
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $role = $_POST['role'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $status = $_POST['status'];

        $staff = new Staff();
        $staff->firstname = $firstname;
        $staff->lastname = $lastname;
        $staff->role = $role;
        $staff->email = $email;
        $staff->password = $password;
        $staff->status = $status;

        if ($staff->add()) {
            echo "success";
        } else {
            echo "Failed to add staff.";
        }
    }

?>