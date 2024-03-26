<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BCA Quiz Hub | Quiz</title>

    <!-- fontawesome link  -->
    <script src="https://kit.fontawesome.com/c9a02cbee6.js" crossorigin="anonymous"></script>
    <!-- fontawesome link  -->
    

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300&display=swap" rel="stylesheet">
    <!-- google fonts -->


    <link rel="website icon" href="../Images/favicon.png" type="png">


    <link rel="stylesheet" href="../Styles/quiz.css">
</head>

<body>

    <div class="top">
        <i class="fa-solid fa-bars" id="hamburger-icon" onclick="toggle()"></i> 
        <div>
            <a href="home.html">
                <img class="logo" src="../Images/logo.png" alt="">
            </a>
        </div>

        <div class="navbar" id="navbar">
            <ul>
                <li><a href="home.html"><i class="fa-solid fa-house"></i><span>Home</span></a></li>
                <li><a href="quiz_selection.html"><i class="fa-solid fa-clipboard-list"></i><span>Quiz</span></a></li>
                <li><a href="team.html"><i class="fa-solid fa-users"></i><span>Team</span></a></li>
                <li><a href="about_us.html"><i class="fa-solid fa-circle-info"></i><span>About</span></a></li>
                <li><a href="contact.php"><i class="fa-regular fa-message"></i><span>Contact</span></a></li>
            </ul>
        </div>
    </div>

    <div class="mcq">
        <form action="quiz_result.php" method="POST">
            <table>
                <?php
                    session_start();
                    $subject = $_GET['subject'];

                    $db = mysqli_connect('localhost','root','','bca');

                    $correct_answer = array();
                    $question_no = array(); //to store random numbers which will be used to select question from database (question id)
                    $i = 0;

                    //selecting available question no from database
                    $all_question_no = array();
                    $result = mysqli_query($db,"SELECT `q_id` FROM `$subject`");

                    while($row = mysqli_fetch_assoc($result))
                    {
                        $all_question_no[] = $row['q_id'];
                    }

                    //to terminate execution of code if available questions in database is less than 10
                    if(count($all_question_no)<10)
                    {
                        echo '<p style="color:red;text-align:center;">ERROR!!<br>Not enough Question in database. Please try other subjects<br><p>';
                        echo "Apologies for inconvenience";

                        exit();
                    }


                    //will generate 10 non-repetative random numbers
                    while($i<10) 
                    {
                        $rand = array_rand($all_question_no);
                        if(!in_array($rand,$question_no))
                        {
                            $question_no[] = $all_question_no[$rand];
                            $i++;
                        }
                    }

                    
                    //displays questions and answers
                    for($i=0;$i<10;$i++)
                    {
                        $result = mysqli_query($db,"SELECT * FROM `$subject` WHERE `q_id`={$question_no[$i]}");
                        $row = mysqli_fetch_assoc($result);

                        echo '<tr>';
                            echo '<td>'.($i+1).')</td>';
                            echo '<td colspan="6">'.$row['question'].'</td>';
                        echo '</tr>';
                        echo '<tr>';
                            echo '<td rowspan="2"></td>';
                            echo '<td><input type="radio" id="q'.($i+1).'a" name="q'.($i+1).'" value="a"></td>';
                            echo '<td><label for="q'.($i+1).'a">a)</label></td>';
                            echo '<td><label for="q'.($i+1).'a">'.$row['option_a'].'</label></td>';

                            echo '<td><input type="radio" id="q'.($i+1).'b" name="q'.($i+1).'" value="b"></td>';
                            echo '<td><label for="q'.($i+1).'b">b)</label></td>';
                            echo '<td><label for="q'.($i+1).'b">'.$row['option_b'].'</label></td>';
                        echo '</tr>';
                        echo '<tr>';
                            echo '<td><input type="radio" id="q'.($i+1).'c" name="q'.($i+1).'" value="c"></td>';
                            echo '<td><label for="q'.($i+1).'c">c)</label></td>';
                            echo '<td><label for="q'.($i+1).'c">'.$row['option_c'].'</label></td>';
                            echo '<td><input type="radio" id="q'.($i+1).'d" name="q'.($i+1).'" value="d"></td>';
                            echo '<td><label for="q'.($i+1).'d">d)</label></td>';
                            echo '<td><label for="q'.($i+1).'d">'.$row['option_d'].'</label></td>';
                        echo '</tr>';

                        $correct_answer[] = $row['answer'];
                    }

                    $_SESSION['correct_answer'] = $correct_answer;
                    $_SESSION['subject'] = $subject;
                    $_SESSION['question_no'] = $question_no;


                ?>
            </table>
            <br><br>
            <button class="submit" name="submit">Submit</button>
        </form>
        <br><br>
    </div>
    
    <!-- makes navbar responsive -->
    <script>
        let navbar = document.getElementById('navbar');
        let navbar_visible = false;

        function toggle()
        {
            if(navbar_visible == false)
            {
                navbar.style.inset = '4rem auto auto 0rem';
                navbar_visible = true;
            }
            else
            {
                navbar.style.inset = '4rem auto auto -9rem';
                navbar_visible = false;
            }
        }
    </script>
</body>
</html>