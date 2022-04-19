<?php    include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
            <br><br>

            <?php
            if(isset($_SESSION['add'])); // Checking whether Session is Set or Not
            {
                // echo $_SESSION['add']; // Displaying Session Message
                unset($_SESSION['add']); // Removing Session Message
            }
            ?>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name</td>
                    <td><input type="text" name="full_name" placeholder="Enter your Name"></td>
                </tr>

                <td>Username</td>
                <td>
                    <input type="text" name="username" placeholder="Enter your Username">
                </td>

                <tr>
                    <td>Password</td>
                    <td>
                        <input type="password" name="password" placeholder="Your Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php include('./partials/footer.php')?>

<?php
    //  Process the value from form and save it in Database
    // Check whether the submit button is clicked or not

    if(isset($_POST['submit']))
    {
        // Button Clicked
        // echo "Clicked";

        // 1. Get data from form
         $full_name = $_POST['full_name'];
         $username = $_POST['username'];
         $password = md5($_POST['password']); // Password Encrypted with md5

        // 2. SQL Query to save data into database

        $sql = "INSERT INTO tbl_admin SET 
            full_name= '$full_name',
            user_name = '$username',
            password = '$password'
        ";
        // 3. Executing Query and Saving Data into Database
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        // 4. Check whether the (Query is Executed) data is inserted or not and to display appropriate message

        if($res==TRUE)
        {
            // Data Inserted
            // Create a Session Variable to Display Message
            $_SESSION['add'] = "Admin Added Successfully";
            // Redirect page to Manage Admin
            header("location:".SITEURL.'admin/manage-admin.php');
        }
        else
        {
            // Failed to insert data
            $_SESSION['add'] = "Failed to add Admin";
            // Redirect page to Add Admin
            header("location:".SITEURL.'admin/add-admin.php');
        }

    }
?>