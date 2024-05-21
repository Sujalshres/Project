<?php

session_start();
    // checking session 
    if(!isset($_SESSION['username']))
    {
        // redirecting to login page if user is not logged in 
        header("Location: ../HTML/admin_login.html");
        exit();
    }

?>

<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BCA Quiz Hub</title>

    <!-- fontawesome link  -->
    <script src="https://kit.fontawesome.com/c9a02cbee6.js" crossorigin="anonymous"></script>
    <!-- fontawesome link  -->
    

    <!-- google fonts -->
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300&display=swap" rel="stylesheet"> -->
    <!-- google fonts -->

    <link rel="website icon" href="../Images/favicon.png" type="png">

    <link rel="stylesheet" href="../Styles/settings.css">
</head>
<body>
    <div class="container">
        <h1>Settings</h1>

        <form action="" method="POST">
            <div class="box">
                <h4>Change Password</h4>
                
                <table>
                    
                    <tr>
                        <td>Username</td>
                        <td><input type="text" name="username" required></td>
                    </tr>
                    
                    <tr>
                        <td>Old Password</td>
                        <td><input type="password" name="password" required></td>
                    </tr>
                    
                    <tr>
                        <td>New Password</td>
                        <td><input type="password" name="newpassword1" required></td>
                    </tr>
                    
                    <tr>
                        <td>Retype Password</td>
                        <td><input type="password" name="newpassword2" required></td>
                    </tr>
                    
                    
                </table>
                <input class="submit" type="submit" value="Submit" name="submit">
                <a class="cancel" href="admin.php"><p>Cancel</p></a>
                
            </form>

            <?php
                $con = mysqli_connect('localhost', 'root', '', 'bca_admin');

                // credentials of database 
                $validadmin1 = mysqli_query($con, "SELECT * FROM `admin` WHERE `admin_id`='1'");
                $validadmin2 = mysqli_query($con, "SELECT * FROM `admin` WHERE `admin_id`='2'");
                
                if (isset($_POST['submit']) && $_POST['newpassword1'] === $_POST['newpassword2']) 
                {
                    // storing credentials from database
                    $row1 = mysqli_fetch_assoc($validadmin1);
                    $row2 = mysqli_fetch_assoc($validadmin2);
                
                    // storing user input old credentials 
                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    //storing user input new password
                    $newpassword = $_POST['newpassword1'];
                
                    if(($username == $row1['username'] && $password == $row1['password']) || ($username == $row2['username'] && $password == $row2['password'])) 
                    {
                        mysqli_query($con, "UPDATE `admin` SET `password`='$newpassword' WHERE `username`='$username'");
                        session_destroy();
                        header("Location: ../HTML/admin_login.html");
                        exit();
                    } 
                    else 
                    {
                        echo '<p style="color:red;">Incorrect username or password</p>';
                    }
                }
                
            ?>
            
        </div>

    </div>
</body>
</html>