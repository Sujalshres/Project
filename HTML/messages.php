<?php
    session_start();
    // checking session 
    if(!isset($_SESSION['username']))
    {
        // redirecting to login page if user is not logged in 
        header("Location: ../HTML/admin_login.html");
        exit();
    }

    //database connection
    $con = mysqli_connect('localhost','root','','bca_admin');

    // retreiving credentials for name to display on navbar 
    $name = mysqli_query($con,"SELECT `name` FROM `admin` WHERE `username` = '{$_SESSION['username']}'");
    $row = mysqli_fetch_assoc($name);

    //retrieving message to show on notifications
    $message = mysqli_query($con,"SELECT * FROM `feedback` WHERE is_read = ''");
?>


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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300&display=swap" rel="stylesheet">
    <!-- google fonts -->


    <link rel="website icon" href="../Images/favicon.png" type="png">

    <link rel="stylesheet" href="../Styles/messages.css">


</head>

<body class="darkmode">
    <header>
        <div class="top">
            <div>
                <a href="home.html">
                    <img class="logo" id="logo" src="../Images/logo.png" alt="">
                </a>
            </div>

            <div class="navbar">

                <ul>
                    <li id="theme"><i class="fa-solid fa-circle-half-stroke" name="theme" onclick="theme()"></i></li>

                    <li id="admin-icon-li"><i class="fa-solid fa-circle-user"></i></li>

                    <div class="options-admin" id="options-admin">
                        <!-- options to show when clicked on admin icon  -->
                        <ul>
                            <li style="cursor: default;">
                                <?php echo $row['name']; ?>
                            </li>
                            <hr>
                            <li><a href="">Settings</a></li>
                            <li><a href="../php/admin_logout.php">Log Out</a></li>
                        </ul>
                    </div>

                </ul>
            </div>
        </div>
        <!-- navigation bar with logo ends  -->
    </header>

    <div class="aligning">
        <div class="messages">
            <h1>Messages</h1>
            <hr>
            <br>
            <ul>

                
                <?php
                while($message_row=mysqli_fetch_assoc($message))
                {
                    echo '
                        <div class="message">
                            <div>
                                <li>Name: '.$message_row['name'].'</li>
                                <li>Email: '.$message_row['email'].'</li>
                                <br>
                                <li>'.$message_row['message'].'</li>
                            </div>

                            <div>
                                <a href="../php/read.php?mid='.$message_row['m_id'].'">
                                    <i class="fa-solid fa-check"></i>
                                     Mark as read
                                </a>
                            </div>
                        </div>
                    ';

                }
                ?>
            </ul>
        </div>
    </div>


    <script src="../Script/messages.js"></script>
</body>