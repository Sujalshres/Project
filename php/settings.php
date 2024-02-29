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