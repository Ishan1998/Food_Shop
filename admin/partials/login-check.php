<!-- <?php
    // Authorization
    // Checking user is logged in or not
    if(!isset($_SESSION['user']))
    {
        // User not logged in
        // Redirect to login page
        $_SESSION['no-login-message']="<div class='error' text-center>Please login to access Admin Panel.</div>";

        header('location:'.SITEURL.'admin/login.php');

    }


?> -->