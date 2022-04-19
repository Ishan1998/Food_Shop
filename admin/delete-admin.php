<?php
include('./config/config.php');
// 1. Get Id of admin to be deleted
     $id = $_GET['id'];
// 2. SQL Query to Delete Admin
    $sql ="DELETE FROM tbl_admin WHERE id=$id";
// Execute the Query
$res = mysqli_query($conn,$sql);

// Checking the Query
if($res==TRUE)
{
    // Admin Deleted
    // echo "Admin Deleted";
    // Create Session variable to display message
    $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully</div>";
    // Redirect to Manage-Admin Page
    header('location:'.SITEURL.'admin/manage-admin.php');
}
else
{
    // Failed to Delete Admin
    // echo "Failed to Delete Admin";

    $_SESSION['delete'] = "<div class='error'>Failed to Delete Admin.</div>";
    // Redirect to Manage-Admin Page
    header('location:'.SITEURL.'admin/manage-admin.php');
}
// 3. Redirect to Manage Admin page with message(success/error)   




?>