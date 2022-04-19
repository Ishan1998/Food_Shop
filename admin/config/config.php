<?php
        // Start Session
        session_start();
        // Create Constant to store Non Repeating Values
        define('SITEURL', 'http://localhost/food/');
        define('LOCALHOST', 'localhost');
        define('DB_USERNAME','root');
        define('DB_PASSWORD', '');
        define('DB_NAME', 'food_orders');
        
        $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); // Database Connection
        $db_select = mysqli_select_db($conn, DB_NAME)or die(mysqli_error());  // Selecting Database Name
        // $res = mysqli_query($conn, $sql) or die(mysqli_error());
 ?>