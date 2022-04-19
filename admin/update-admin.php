<?php include('partials/menu.php')?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>
        <br><br>

        <?php
            // 1. Get the ID of selected admin
                $id=$_GET['id'];

            // 2. Create SQL Query to create details
                $sql="SELECT * FROM tbl_admin WHERE id=$id";

            // 3. Execute Query
                $res = mysqli_query($conn, $sql);
            // 4. Checking the query
            if($res==TRUE)
            {
                // Checking the data availability
                $count = mysqli_num_rows($res);
                // Checking admin data
                if($count==1)
                {
                    // Get the details
                    echo "Admin Available";
                    $row=mysqli_fetch_Assoc($res);

                    $full_name = $row['full_name'];
                    $username = $row['user_name'];
                }
                else
                {
                    // Redirect to Admin Page
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }
        
        ?>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name</td>
                    <td>
                        <input type="text" name="full_name" value="<?php echo $full_name; ?>">
                    </td>
                </tr>

                <tr>
                <td>Username</td>
                    <td>
                        <input type="text" name="user_name" value="<?php echo $username; ?>">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>

        </form>
    </div>
</div>
<?php

// Checking Submit Button

if(isset($_POST['submit']))
{
    // echo "Button Clicked";
    // Get all the values from form to update
     $id = $_POST['id'];
     $full_name = $_POST['full_name'];
     $username = $_POST['user_name'];

    // Create a SQL Query to update admin
    $sql = "UPDATE tbl_admin SET
    full_name = '$full_name',
    user_name = '$username'
    WHERE id='$id'
    ";

    // Execute the Query
    $res = mysqli_query($conn, $sql);

    // Check whether the query executed successfully or not
    if($res==TRUE)
    {
        // Query Executed
        $_SESSION['update'] = "<div class ='success'>Admin Updated Successfully.</div>";

        // Redirect to Manage-Admin page
        header('location:' .SITEURL. 'admin/manage-admin.php');        $_SESSION['update'] = "<div class ='success'>Admin Updated Successfully.</div>";

        // Redirect to Manage-Admin page
        header('location:' .SITEURL. 'admin/manage-admin.php');
    }
    else
    {
        // Failed to Update Admin
        $_SESSION['update'] = "<div class ='success'>Failed to Update Admin.</div>";

        // Redirect to Manage-Admin page
        header('location:' .SITEURL. 'admin/manage-admin.php');

    }
}

?>
<?php include('partials/footer.php')?>