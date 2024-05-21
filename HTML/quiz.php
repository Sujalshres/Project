<?php
    session_start(); 
    //session needs to be started before any HTML
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BCA Quiz Hub | Quiz</title>

    <!-- fontawesome link  -->
    <!-- <script src="https://kit.fontawesome.com/c9a02cbee6.js" crossorigin="anonymous"></script> -->
    <!-- fontawesome link  -->
    

    <!-- google fonts -->
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300&display=swap" rel="stylesheet"> -->
    <!-- google fonts -->


    <link rel="website icon" href="../Images/favicon.png" type="png">


    <link rel="stylesheet" href="../Styles/quiz.css">
</head>

<body>

    <div class="top">
        <svg viewBox="0 0 24 24" id="hamburger-icon" onclick="toggle()"><path fill="currentColor" d="M3,6H21V8H3V6M3,11H21V13H3V11M3,16H21V18H3V16Z" /></svg>

        <div>
            <a href="home.html">
                <img class="logo" src="../Images/logo.png" alt="">
            </a>
        </div>

        <div class="navbar" id="navbar">
                <ul>
                    <li>
                        <a href="home.html">
                            <svg  viewBox="0 0 576 512"><path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="quiz_selection.html">
                            <svg viewBox="0 0 384 512"><path d="M192 0c-41.8 0-77.4 26.7-90.5 64H64C28.7 64 0 92.7 0 128V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V128c0-35.3-28.7-64-64-64H282.5C269.4 26.7 233.8 0 192 0zm0 64a32 32 0 1 1 0 64 32 32 0 1 1 0-64zM72 272a24 24 0 1 1 48 0 24 24 0 1 1 -48 0zm104-16H304c8.8 0 16 7.2 16 16s-7.2 16-16 16H176c-8.8 0-16-7.2-16-16s7.2-16 16-16zM72 368a24 24 0 1 1 48 0 24 24 0 1 1 -48 0zm88 0c0-8.8 7.2-16 16-16H304c8.8 0 16 7.2 16 16s-7.2 16-16 16H176c-8.8 0-16-7.2-16-16z"/></svg>
                            <span>Quiz</span>
                        </a>
                    </li>
                    <li>
                        <a href="team.html">
                            <svg viewBox="0 0 640 512"><path d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z"/></svg>
                            <span>Team</span>
                        </a>
                    </li>
                    <li>
                        <a href="about_us.html">
                            <svg viewBox="0 0 512 512"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg>
                            <span>About</span>
                        </a>
                    </li>
                    <li>
                        <a href="contact.php">
                            <svg viewBox="0 0 512 512"><path d="M160 368c26.5 0 48 21.5 48 48v16l72.5-54.4c8.3-6.2 18.4-9.6 28.8-9.6H448c8.8 0 16-7.2 16-16V64c0-8.8-7.2-16-16-16H64c-8.8 0-16 7.2-16 16V352c0 8.8 7.2 16 16 16h96zm48 124l-.2 .2-5.1 3.8-17.1 12.8c-4.8 3.6-11.3 4.2-16.8 1.5s-8.8-8.2-8.8-14.3V474.7v-6.4V468v-4V416H112 64c-35.3 0-64-28.7-64-64V64C0 28.7 28.7 0 64 0H448c35.3 0 64 28.7 64 64V352c0 35.3-28.7 64-64 64H309.3L208 492z"/></svg>
                            <span>Contact</span>
                        </a>
                    </li>
                </ul>
            </div>
    </div>

    <div class="mcq">
        <form action="quiz_result.php" method="POST">
            <table>
                <?php
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
                        $rand_key = array_rand($all_question_no);
                        $question_no[$i] = $all_question_no[$rand_key];
                        unset($all_question_no[$rand_key]);
                        $i++;
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