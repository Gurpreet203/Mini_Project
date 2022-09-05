<?php

    include 'validation.php';
    if( PageValidate() )
    {
        header("location:../users/mainPage.php");
    }

// to check if user enter all fields of form in login page
    if(isset($_POST['submit']))
    {
        session_start();
        
        $_SESSION['error'] = EmailPassCheck($_POST['email'] , $_POST['pass']);

        if( !empty($_SESSION['error']) )
        {
            header('location:LogIn.php');

        } else{
            if( !empty($_SESSION['error']) )
            {
                unset($_SESSION['error']);
            }

            foreach($_SESSION['User'] as $key=>$value)
            {
                if($value['email'] == $_POST['email'] && $value['pass'] == $_POST['pass'])
                {
                    $_SESSION['loggedin'] = true;
                    $_SESSION['uname']= $value['fname'];
                    header("location:../users/mainPage.php");
                }
            }
            // display when user not found
            $_SESSION['error']['found'] =  "User not Found";
            header("location:LogIn.php");
        }
    }
?>