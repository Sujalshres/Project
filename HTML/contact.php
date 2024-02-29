<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BCA Quiz Hub | Contact</title>

    <!-- fontawesome link  -->
    <script src="https://kit.fontawesome.com/c9a02cbee6.js" crossorigin="anonymous"></script>
    <!-- fontawesome link  -->


    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300&display=swap" rel="stylesheet">
    <!-- google fonts -->


    <link rel="website icon" href="../Images/favicon.png" type="png">


    <link rel="stylesheet" href="../Styles/contact.css">
    <!-- <script src="../Script/home.js"></script> -->
</head>

<body>
    <!-- navigation bar with logo -->
    <div class="top">
        <div>
            <a href="home.html">
                <img class="logo" src="../Images/logo.png" alt="">
            </a>
        </div>

        <div class="navbar">
            <ul>
                <li><a href="home.html">Home</a></li>
                <li><a href="quiz_selection.html">Quiz</a></li>
                <li><a href="team.html">Team</a></li>
                <li><a href="about_us.html">About</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </div>
    </div>
    <!-- navigation bar with logo ends  -->


    <!-- row 1 start  -->
    <div class="row1">
        <div class="description">
            <div>
                <h1>CONTACT US</h1>
            </div>

            <div>
                <p>Got questions or just want to chat? </p>
                <p> Drop us a line! We're all ears.</p>
            </div>

            <a href="#message-section"><button class="top-message-button">Message</button></a>
        </div>

        <div>
            <img src="../Images/contact us.jpg" alt="" class="background-image">
        </div>

    </div>
    <!-- row 1 ends  -->

    <!-- row 2 starts  -->
    <div class="row2" id="message-section">
        <h1>Leave us a message</h1>
        <div class="box">
            <div class="info">
                <h2>Friendly Reminder</h2><br>
                <p>
                    While the Name and Email fields are optional, providing this information ensures a more personalized
                    and
                    timely response from our team.
                </p>
                <p>
                    Please understand that response times may vary based on the volume of requests. Thank you for
                    reaching out.
                </p>
            </div>

            <form action="" method="post">
                <div class="message-input-div">
                    <div class="name-email">
                        <div id="name">
                            <p>Name</p>
                            <input type="text" name="name">
                        </div>

                        <div id="email">
                            <p>Email</p>
                            <input type="email" name="email">
                        </div>
                    </div>

                    <div id="message">
                        <p>Message</p>
                        <textarea id="" cols="" rows="" name="message" required ></textarea>
                    </div>

                    <button class="sub" name="sub">Submit</button>
                    <!-- <input type="submit" class="" value="Submit"> -->
                </div>
            </form>

            <?php
                $con = mysqli_connect('localhost','root','','bca_admin');

                if(isset($_POST['sub']))
                {
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $message = $_POST['message'];

                    if($name == "")
                    {
                        $name = "Anonymous";
                    }
                    if($email == "")
                    {
                        $email = "Anonymous";
                    }

                    mysqli_query($con,"INSERT INTO `feedback` VALUES(NULL,'$name','$email','$message','');");
                }
            ?>

        </div>
    </div>
    <!-- row 2 ends  -->


    <!-- row 3 starts  -->
    <div class="row3">
        <div class="column1">
            <img src="../Images/logo.png" alt="" class="bottom_logo">

            <p>
                Welcome to BCA Quiz Hub, where you may learn how to answer Multiple-Choice Questions (MCQs) specifically
                designed for BCA students. We at BCA Quiz Hub are here to transform your educational experience since we
                recognize the difficulties students encounter in locating current and pertinent multiple-choice
                questions.
            </p>

            <button class="readmore">Read more</button>
        </div>

        <div class="column2">
            <ul>
                <li><a href="home.html">Home</a></li>
                <li><a href="">Quiz</a></li>
                <li><a href="team.html">Team</a></li>
                <li><a href="about_us.html">About</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </div>

        <div class="column3">
            <ul>
                <li>
                    <p><a href=""><i class="fa-solid fa-envelope"></i>&nbsp;&nbsp;info.bcaquizhub@gmail.com</a></p>
                </li>
                <li>
                    <p><a href=""><i class="fa-solid fa-phone"></i>&nbsp;&nbsp;9841398271, 01-5580212</a></p>
                </li>
            </ul>
        </div>
    </div>
    <!-- row 3 ends  -->

    <!-- row 4 starts  -->
    <div class="row4">
        <p>&copy; 2023 BCA Quiz Hub. All rights reserved.</p>
    </div>
    <!-- row 4 ends  -->