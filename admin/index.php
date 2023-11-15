<?php

    session_start();
    if (!isset($_SESSION['user']) || $_SESSION['user'] != 'employee'){
        header('location: login.php');
    }