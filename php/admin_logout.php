<?php

    session_start();
    $_SESSION = array();
    session_destroy();

    header("Location: ../HTML/admin_login.html");
    exit();
?>