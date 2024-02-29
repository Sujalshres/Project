<?php


    session_start();
    // checking session 
    if(!isset($_SESSION['username']))
    {
        // redirecting to login page if user is not logged in 
        header("Location: ../HTML/admin_login.html");
        exit();
    }



    $id = $_GET['qid'];
    $subject = $_GET['subject'];
    $con = mysqli_connect('localhost','root','','bca');
    mysqli_query($con,"DELETE FROM `$subject` WHERE q_id = '$id'");
    header("Location:../HTML/admin.php");
?>