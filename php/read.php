<?php

session_start();
    // checking session 
    if(!isset($_SESSION['username']))
    {
        // redirecting to login page if user is not logged in 
        header("Location: ../HTML/admin_login.html");
        exit();
    }

$message_id = $_GET['mid'];

$con = mysqli_connect("localhost","root","","bca_admin");
mysqli_query($con,"UPDATE `feedback` SET `is_read`='true' WHERE `m_id`='$message_id'");

header('Location: ../HTML/messages.php');
exit();
?>