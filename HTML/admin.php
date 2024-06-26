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
    $message = mysqli_query($con,"SELECT * FROM `feedback` WHERE is_read='' ORDER BY m_id DESC LIMIT 5");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BCA Quiz Hub</title>

    <!-- fontawesome link  -->
    <!-- <script src="https://kit.fontawesome.com/c9a02cbee6.js" crossorigin="anonymous"></script> -->
    <!-- fontawesome link  -->


    <!-- google fonts -->
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300&display=swap" rel="stylesheet"> -->
    <!-- google fonts -->


    <link rel="website icon" href="../Images/favicon.png" type="png">

    <link rel="stylesheet" href="../Styles/admin.css">

    
</head>

<body class="darkmode">
    <header>
        <div class="top">
            <div>
                <a href="home.html">
                    <img class="logo" src="../Images/logo.png" alt="">
                </a>
            </div>

            <div class="navbar">

                <ul>
                    <li id="theme">
                        <!-- <i class="fa-solid fa-circle-half-stroke" name="theme" onclick="theme()"></i> -->
                        <svg fill="grey" name="theme" onclick="theme()" viewBox="0 0 512 512"><path d="M448 256c0-106-86-192-192-192V448c106 0 192-86 192-192zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256z"/></svg>
                    </li>

                    <li id="notification-icon-li">
                        <!-- <i class="fa-solid fa-bell"></i> -->
                        <svg fill="grey" viewBox="0 0 448 512"><path d="M224 0c-17.7 0-32 14.3-32 32V51.2C119 66 64 130.6 64 208v18.8c0 47-17.3 92.4-48.5 127.6l-7.4 8.3c-8.4 9.4-10.4 22.9-5.3 34.4S19.4 416 32 416H416c12.6 0 24-7.4 29.2-18.9s3.1-25-5.3-34.4l-7.4-8.3C401.3 319.2 384 273.9 384 226.8V208c0-77.4-55-142-128-156.8V32c0-17.7-14.3-32-32-32zm45.3 493.3c12-12 18.7-28.3 18.7-45.3H224 160c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7z"/></svg>
                    </li>

                    <div class="notification" id="notification">
                        <!-- options to show when clicked on notification icon  -->
                        <ul>
                            <li><a href="messages.php" target="_blank"><i class="fa-solid fa-arrow-up-right-from-square" id="new_tab"></i> Open in new tab</a></li>
                            <!-- <li>Messages</li> -->
                            <!-- <hr> -->
                            <?php
                                while($message_row=mysqli_fetch_assoc($message))
                                {
                                    echo "<div class='message'>
                                    <li><h4>Name: ".$message_row['name']."</h4></li>
                                    <li><h4>Email: ".$message_row['email']."</h4></li>
                                    <br>
                                    <li><p>".$message_row['message']."</p></li>
                                    </div>";
                                }
                            ?>
                        </ul>
                    </div>
                    
                    <li id="admin-icon-li">
                        <!-- <i class="fa-solid fa-circle-user"></i> -->
                        <svg fill="grey" viewBox="0 0 512 512"><path d="M399 384.2C376.9 345.8 335.4 320 288 320H224c-47.4 0-88.9 25.8-111 64.2c35.2 39.2 86.2 63.8 143 63.8s107.8-24.7 143-63.8zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm256 16a72 72 0 1 0 0-144 72 72 0 1 0 0 144z"/></svg>
                    </li>

                    <div class="options-admin" id="options-admin">
                        <!-- options to show when clicked on admin icon  -->
                        <ul>
                            <li style="cursor: default;"><?php echo $row['name']; ?></li>
                            <hr>
                            <li><a href="settings.php">Settings</a></li>
                            <li><a href="../php/admin_logout.php">Log Out</a></li>
                        </ul>
                    </div>

                </ul>
            </div>
        </div>
        <!-- navigation bar with logo ends  -->
    </header>

    <h1>Admin Pannel</h1>

    <div class="aligning">

        <div class="add" id="add">
            <h3>Add Questions</h3>
            <form action="" method="post">
                <div>
                    <p>Semester:</p>
                    <select id="semester" onchange="updatesubject()" name="semester" required>
                        <option value="">--Select a semester--</option>
                        <option value="1">1</option>
                        <option value="4">4</option>
                    </select>

                    <p>Subject:</p>
                    <select id="subject" name="subject" required>
                        <option value="">--Select a subject--</option>
                        <!-- options will be placed dynamically using js  -->
                    </select>
                </div>

                <div>
                    <p>Question:</p>
                    <input class="question" type="text" name="question" required>
                </div>

                <div>
                    <p>Options:</p>
                    a&#41;<input type="text" name="opt_a" required>
                    b&#41;<input type="text" name="opt_b" required>
                    c&#41;<input type="text" name="opt_c" required>
                    d&#41;<input type="text" name="opt_d" required>
                </div>

                <div>
                    <p>Answer:</p>
                    <select name="answer" required>
                        <option value="a">a</option>
                        <option value="b">b</option>
                        <option value="c">c</option>
                        <option value="d">d</option>
                    </select>
                </div>


                <input class="submit" type="submit" value="Submit" name="sub">
                <input class="reset" type="reset" value="Reset">

                
            </form>

            <?php
                    if(isset($_POST['sub']))
                    {
                        $subject = $_POST['subject'];
                        $question = $_POST['question'];
                        $opt_a = $_POST['opt_a'];
                        $opt_b = $_POST['opt_b'];
                        $opt_c = $_POST['opt_c'];
                        $opt_d = $_POST['opt_d'];
                        $answer = $_POST['answer'];
                        
                        $con = $con = mysqli_connect('localhost','root','','bca');
                        mysqli_query($con, "INSERT INTO `$subject`(`q_id`, `question`, `option_a`, `option_b`, `option_c`, `option_d`, `answer`) VALUES (NULL, '$question', '$opt_a', '$opt_b', '$opt_c', '$opt_d', '$answer')");

                        echo "The Question is added";

                    }
                ?>
        </div>

        <div class="edit" id="edit">
            <h3>Edit or Delete</h3>

            <form action="" method="POST">
                <div>
                    <p>Semester:</p>
                    <select id="semester2" onchange="updatesubject2()">
                        <option value="Select a semester">--Select a semester--</option>
                        <option value="1">1</option>
                        <option value="4">4</option>
                    </select>

                    <p>Subject</p>
                    <select id="subject2" name="subject2" required>
                        <option value="">--Select a subject--</option>
                        <!-- subjects will be added dynamically -->
                    </select>
                </div>

                <div>
                    <input class="submit" type="submit" value="Display" name="display">
                </div>
            </form>
            

            <div>
                <table border="1px">

                    <?php
                        if(isset($_POST['display']))
                        {
                            $subject = $_POST['subject2'];

                            $con = mysqli_connect('localhost','root','','bca');
                            $sql = "SELECT * FROM `$subject`;";
                            $result = mysqli_query($con,$sql);

                            if(mysqli_num_rows($result)>0)
                            {
                                echo '<tr>
                                        <th>Q_id</th>
                                        <th>Question</th>
                                        <th>Option a</th>
                                        <th>Option b</th>
                                        <th>Option c</th>
                                        <th>Option d</th>
                                        <th>Answer</th>
                                        <th class="action">Action</th>
                                    </tr>';
            
                                while ($row = mysqli_fetch_assoc($result)) 
                                {
                                    echo "<tr>";
                                    echo "<td>".$row['q_id']."</td>";
                                    echo "<td>".$row['question']."</td>";
                                    echo "<td>".$row['option_a']."</td>";
                                    echo "<td>".$row['option_b']."</td>";
                                    echo "<td>".$row['option_c']."</td>";
                                    echo "<td>".$row['option_d']."</td>";
                                    echo "<td>".$row['answer']."</td>";
                                    echo "<td>
                                        <a href='edit.php?qid=".$row['q_id']."&subject=".$subject."'> 
                                            <i class='fa-solid fa-pen'></i> 
                                            Edit
                                        </a> 
                                        <br> 
                                        <a id='delete' href='../php/delete.php?qid=".$row['q_id']."&subject=".$subject."' onclick='return confirmdelete();'> 
                                            <i class='fa-solid fa-x'></i> 
                                            Delete
                                        </a>
                                    </td>";
                                    echo "</tr>";
                                }
                                    
                            }
                            else
                            {
                                echo "No data to display!!!";
                            }
                        }
                    ?>
                </table>
            </div>
        </div>

    </div>
</body>

<script src="../Script/admin.js"></script>

</html>