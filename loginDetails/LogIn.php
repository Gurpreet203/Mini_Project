<?php

    session_start();
    include 'loginCheck.php';
// this conditions is for make log in page heading dynamic like if user not found show user not found otherwise user inserted etc.
    if(!empty($_SESSION['error']['found']))
    {
        echo "<div><h2>".$_SESSION['error']['found'] ."</h2></div>";
    }

    if(!empty($_SESSION['User']) && empty($_SESSION['error']['found']) && !isset($_GET['already']) && !isset($_GET['pass']))
    {
        echo "<h2> User Inserted Successfully </h2>";
    }

    if(isset($_GET['already']) && empty($_SESSION['error']['found']))
    {
        echo "<h2> Previous User </h2>";
    }
    if(isset($_GET['pass']) )
    {
        echo "<h2> Password changed successfully </h2>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <title>Document</title>
</head>
<body>
    <form action="loginCheck.php" method="post" class="login">
        <h1>LogIn</h1>

        <label for="email">Email</label>
        <input type="email" name="email" class="email" placeholder="Email"/>

                <?php
                    if(!empty($_SESSION['error']['email']))
                    {
                        echo "<div>".$_SESSION['error']['email']."</div>";
                    }
                ?>

        <label for="pass">Password</label>
        <input type="password" name="pass" class="pass" placeholder="Password"/>

                <?php
                    if(!empty($_SESSION['error']['pass']))
                    {
                        echo "<div>".$_SESSION['error']['pass']."</div>";
                    }
                ?>

        <input type="submit" name="submit" value="LogIn"/>
        <a href="forgetPassword.php">Forget Password ??</a><br>
        <a href="signup.php">Don't have a account? create one</a>
    </form>
</body>
</html>