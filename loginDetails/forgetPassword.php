<?php
    session_start();
    include 'validation.php';
    PageValidate();

    if(isset($_POST['submit']))
    {
        if(!empty($_SESSION['error']))
        {
            unset($_SESSION['error']);
        }
        
        $_SESSION['error'] = EmailPassCheck($_POST['email'] , $_POST['pass']);

        if(empty($_SESSION['error']))
        {
            if(!empty($_SESSION['error']))
            {
                unset($_SESSION['error']);
            }
            foreach($_SESSION['User'] as $key=>$value)
            {
                if( $value['email'] == $_POST['email'] )
                {
                    $_SESSION['User'][$key]['pass'] = $_POST['pass'];
                    $_SESSION['activity'] = "Password successfully changed";
                    header("location:LogIn.php");
                }
            }
        }
        echo "<h2>User not found</h2>";
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
    <form action="forgetPassword.php" method="post" class="forget">
        <h1>Forget Password</h1>
        <label for="email">Email</label>
        <input type="email" placeholder="Email" name="email"/>
                <?php
                    if(!empty($_SESSION['error']['email']))
                    {
                        echo "<div>".$_SESSION['error']['email']."</div>";
                    }
                ?>
        <label for="pass">New Password</label>
        <input type="password" name="pass"/>
                <?php
                    if(!empty($_SESSION['error']['pass']))
                    {
                        echo "<div>".$_SESSION['error']['pass']."</div>";
                    }
                ?>
        <input type="submit" name="submit" value="Change Password"/>
    </form>
</body>
</html>