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


    <link rel="stylesheet" href="../Styles/quiz.css">
</head>

<body>

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

                    //will generate 10 non-repetative random numbers
                    while($i<10) 
                    {
                        $rand = rand(1,20);
                        if(!in_array($rand,$question_no))
                        {
                            $question_no[] = $rand;
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
                            echo '<td><input type="radio" name="q'.($i+1).'" value="a"></td>';
                            echo '<td>a)</td>';
                            echo '<td>'.$row['option_a'].'</td>';
                            echo '<td><input type="radio" name="q'.($i+1).'" value="b"></td>';
                            echo '<td>b)</td>';
                            echo '<td>'.$row['option_b'].'</td>';
                        echo '</tr>';
                        echo '<tr>';
                            echo '<td><input type="radio" name="q'.($i+1).'" value="c"></td>';
                            echo '<td>c)</td>';
                            echo '<td>'.$row['option_c'].'</td>';
                            echo '<td><input type="radio" name="q'.($i+1).'" value="d"></td>';
                            echo '<td>d)</td>';
                            echo '<td>'.$row['option_d'].'</td>';
                        echo '</tr>';

                        $correct_answer[] = $row['answer'];
                    }

                    $_SESSION['correct_answer'] = $correct_answer;
                    $_SESSION['subject'] = $subject;
                    $_SESSION['question_no'] = $question_no;


                    print_r($correct_answer);
                ?>
            </table>
            <br><br>
            <button class="submit" name="submit">Submit</button>
        </form>
        <br><br>
    </div>
    
</body>
</html>