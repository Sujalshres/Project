<?php
    session_start();

    $con = mysqli_connect('localhost','root','','bca_admin');

    $validadmin1 = mysqli_query($con,"SELECT * FROM `admin` WHERE `admin_id`='1'");
    $validadmin2 = mysqli_query($con,"SELECT * FROM `admin` WHERE `admin_id`='2'");
    
    if(isset($_POST['submit']))
    {
        // storing credentials from database
        $row1 = mysqli_fetch_assoc($validadmin1);
        $row2 = mysqli_fetch_assoc($validadmin2);

        // storing user input credentials 
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(($username == $row1['username'] and $password==$row1['password']) or ($username == $row2['username'] and $row2['password']))
        {
            // storing username in session 
            $_SESSION['username'] = $username;

            // redirecting to admin pannel 
            header("Location: ../HTML/admin.php");
            exit();
        }
        else
        {
            // redirect to login page if credentials are invalid 
            header("Location: ../HTML/admin_login.html");
            exit();
        }
    }
?>