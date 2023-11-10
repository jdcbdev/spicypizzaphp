<?php

    session_start();
    if (!isset($_SESSION['user']) || $_SESSION['user'] != 'staff'){
        header('location: login.php');
    }