<?php    include('partials/menu.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foody Restaurant</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>

    <!-- Main Content Section Starts -->
    <div class="main-content">
        <div class="wrapper">
            <h1>Manage Admin</h1>
            <br>
            <?php
        if(isset($_SESSION['add']))// Checking whether Session is Set or Not
        {
            echo $_SESSION['add']; // Displaying Session Message
            unset($_SESSION['add']); // Removing Session Message
        }

        if(isset($_SESSION ['delete']))
        {
            echo $_SESSION ['delete'];
            unset($_SESSION ['delete']);
        }

        if(isset($_SESSION ['update']))
        {
            echo $_SESSION ['update'];
            unset($_SESSION ['update']);
        }

        if(isset($_SESSION ['user-not-found']))
        {
            echo $_SESSION ['user-not-found'];
            unset($_SESSION ['user-not-found']);
        }

        if(isset($_SESSION ['pwd-not-match']))
        {
            echo $_SESSION ['pwd-not-match'];
            unset($_SESSION ['pwd-not-match']);
        }
      
        if(isset($_SESSION ['change-pwd']))
        {
            echo $_SESSION ['change-pwd'];
            unset($_SESSION ['change-pwd']);
        }
        ?>
            <br><br><br>

            <!-- Button to Add Admin -->
            <a href="add-admin.php" class="btn-primary">Add Admin</a><br><br><br>
            <table class="tbl-full">
                <tr>
                    <th>S.No.</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>

                <?php
            // Query to get all admin
                $sql="SELECT* FROM tbl_admin";
            // Execute the query
            $res = mysqli_query($conn, $sql);

            // Check whether query is executed or not
            if($res==TRUE)
            {
                // Count Rows to Chweck whether we have data in the database or not
                $count = mysqli_num_rows($res); // Function to get all rows in database
                $sn=1; // Created a variable and assigned value to it
                // Check the number of rows
                if($count>0)
                {
                    // We have data in database
                    while($rows=mysqli_fetch_assoc($res))
                    {
                        // Using while loop to get all data from database
                        // And while loop will run as long as we have data in database

                        // Get individual data
                        $id=$rows['id'];
                        $full_name=$rows['full_name'];
                        $username=$rows['user_name'];

                        // Display the values in the table
                        ?>
                            <tr>
                                <td><?php echo $sn++;?></td>
                                <td><?php echo $full_name;?></td>
                                <td><?php echo $username;?></td>
                                <td>
                                    <a href="<?php echo SITEURL;?>admin/update-password.php?id=<?php echo $id;?>" class="btn-primary">Change Password</a>
                                    <a href="<?php echo SITEURL;?>admin/update-admin.php?id=<?php echo $id;?>"  class="btn-secondary">Update Admin</a>
                                    <a href="<?php echo SITEURL;?>admin/delete-admin.php?id=<?php echo $id;?>" class="btn-danger">Delete Admin</a>
                                </td>
                            </tr>

                <?php
                    
                  }
                }
                else
                {
                // We don't have data in database
                }
            }
         ?>
            </table>

        </div>
    </div>
    <!-- Main Content Section Ends -->

    <?php    include('../admin/partials/footer.php');?>
</body>

</html>