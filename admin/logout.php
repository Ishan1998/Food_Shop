<?php 
    include('./config/config.php');
// Destroy the Session and Redirect to login page
    session_destroy();

    header('location:'.SITEURL. 'admin/login.php');
?>