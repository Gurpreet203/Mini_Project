<?php

    session_start();
    include 'registration.php';

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

    <form action="registration.php" method="post">
        <h1>SignUp</h1>
        <label for="fname">First Name</label>
        <input type="text" name="fname" class="fname" placeholder="First Name"/>
       
                <?php
                    if(!empty($_SESSION['error']['fname']))
                    {
                        echo "<div>".$_SESSION['error']['fname']."</div>";
                    }
                ?>

        <label for="lname">Last Name</label>
        <input type="text" name="lname" class="lname" placeholder="Last Name"/>

                <?php
                if(!empty($_SESSION['error']['lname']))
                {
                    echo "<div>".$_SESSION['error']['lname']."</div>";
                }
                ?>

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

        <input type="submit" name="submit" value="SignUp"/>
        <a href="LogIn.php?already=1">Already have a account ? LogIn</a>
        
    </form>
</body>
</html>