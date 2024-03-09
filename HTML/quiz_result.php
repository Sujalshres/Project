<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BCA Quiz Hub | Result</title>

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
    <script src="../Script/quiz_result.js"></script>
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
            <table>
                <?php
                    session_start();

                    //retrieving data from session variable
                    $correct_answer = $_SESSION['correct_answer'];
                    $subject = $_SESSION['subject'];
                    $question_no = $_SESSION['question_no'];
                
                    $db = mysqli_connect('localhost','root','','bca');

                    echo "<h2><br>Congratulations</h2>";
                    
                    $user_answer = array();
                    //code to run after clicking submit
                    if(isset($_POST['submit']))
                    {
                        for($i=0;$i<10;$i++)
                        {
                            $question_name = 'q'.($i+1);
        
                            //if block to AVOID undefined array key error by checking if user has selected an answer
                            if(isset($_POST[$question_name]))
                            {
                                $user_answer[] = $_POST[$question_name]; //storing answer only if user has seleted an answer
                            }
                            else
                            {
                                $user_answer[] = ""; //storing null if no answer is selected
                            } 
                        }
                    }
                
                    $score = 0;
                    for($i=0;$i<10;$i++)
                    {
                        if($correct_answer[$i] == $user_answer[$i])
                        {
                            $score++;
                        }
                    }

                    echo "You scored ".$score;
                    echo "<br><br>";

                    //displays questions and answers
                    $j = 1;
                    foreach($question_no as $i)
                    {
                        $result = mysqli_query($db,"SELECT * FROM `$subject` WHERE `q_id`={$i}");
                        $row = mysqli_fetch_assoc($result);

                        echo '<tr>';
                            echo '<td>'.$j.')</td>';
                            echo '<td colspan="4">'.$row['question'].'</td>';
                        echo '</tr>';
                        echo '<tr>';
                            echo '<td rowspan="2"></td>';
                            echo '<td id="opt'.$j.'_a">a)</td>';
                            echo '<td id="q'.$j.'a">'.$row['option_a'].'</td>';
                            echo '<td id="opt'.$j.'_b">b)</td>';
                            echo '<td id="q'.$j.'b">'.$row['option_b'].'</td>';
                        echo '</tr>';
                        echo '<tr>';
                            echo '<td id="opt'.$j.'_c">c)</td>';
                            echo '<td id="q'.$j.'c">'.$row['option_c'].'</td>';
                            echo '<td id="opt'.$j.'_d">d)</td>';
                            echo '<td id="q'.$j.'d">'.$row['option_d'].'</td>';
                        echo '</tr>';

                        $j++;
                    }

                ?>
            </table>
            <br><br>
            <!-- <input type="submit" class="submit" name="submit"> -->
        <br><br>
    </div>


    <script>
        let correct_answer = <?php echo json_encode($correct_answer); ?>;
        let user_answer = <?php echo json_encode($user_answer); ?>;
        
        //makes color red of all user's answer
        for(let i=0;i<10;i++)
        {
            if(user_answer[i]!="")
            {
                let id = 'q'+(i+1)+user_answer[i];
    
                let sel = document.getElementById(id);
                sel.style.color = 'red';

                let sel2 = document.getElementById("opt"+(i+1)+"_"+user_answer[i]);
                sel2.style.border = '1px solid black';
                sel2.style.borderRadius = "50%";
            }
        }

        //makes color green of all correct answer
        for(let i=0;i<10;i++)
        {
            let id = 'q'+(i+1)+correct_answer[i];

            let sel = document.getElementById(id);
            sel.style.color = 'green';
        }
    </script>

</body>

</html>