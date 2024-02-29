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
    $sql = "SELECT * FROM `$subject` WHERE `q_id`='$id';";
    $result = mysqli_query($con,$sql);

    $row = mysqli_fetch_assoc($result);
        
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

    <link rel="stylesheet" href="../Styles/edit.css">

    
</head>

<body>
    <form action="" method="POST">
        <div class="container">
            <h2>Edit question</h2>
            <br>
            <div class="box">
                <table border="1px">

                    <tr>
                        <th>Question</th>
                        <td><textarea name="question"><?php echo $row['question']?></textarea></td>
                    </tr>

                    <tr>
                        <th>Option a</th>
                        <td><input name="option_a" type="text" value="<?php echo $row['option_a'] ?>"></td>
                    </tr>

                    <tr>
                        <th>Option b</th>
                        <td><input name="option_b" type="text" value="<?php echo $row['option_b'] ?>"></td>
                    </tr>

                    <tr>
                        <th>Option c</th>
                        <td><input name="option_c" type="text" value="<?php echo $row['option_c'] ?>"></td>
                    </tr>

                    <tr>
                        <th >Option d</th>
                        <td><input name="option_d" type="text" value="<?php echo $row['option_d'] ?>"></td>
                    </tr>

                    <tr>
                        <th>Answer</th>
                        <td><input name="answer" name="Open" type="text" value="<?php echo $row['answer'] ?>"></td>
                    </tr>
                    
                </table>
            </div>
            <button value="Submit" name="submit">Submit</button>
            <button><a href="admin.php">Cancel</a></button>
        </div>
    </form>

    <?php

        if (isset($_POST['submit'])) 
        {
            $question = $_POST['question'];
            $option_a = $_POST['option_a'];
            $option_b = $_POST['option_b'];
            $option_c = $_POST['option_c'];
            $option_d = $_POST['option_d'];
            $answer = $_POST['answer'];

            sleep(2);
            mysqli_query($con, "UPDATE `$subject` SET `question`='$question',`option_a`='$option_a', `option_b`='$option_b', `option_c`='$option_c', `option_d`='$option_d', `answer`='$answer' WHERE `q_id`='$id'");
            header("Location: admin.php");
            exit();
        }

    ?>
</body>