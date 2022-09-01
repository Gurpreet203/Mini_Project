<?php
// this function is use to restrict user trying to access other pages without log out
    function PageValidate()
    {
        if(isset($_SESSION['loggedin']))
        {
            if($_SESSION['loggedin']==true)
            {
                header ("location:../users/mainPage.php");
            }
        }
    }

// this function is for check if the user fill email and password or not
    function EmailPassCheck($email , $password)
    {
        if( empty($email) )
        {
            $_SESSION['error']['email'] = "please enter Email";
        }
        else
        {
            if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $_SESSION['error']['email'] = "please enter valid Email";
            }
        }

        if( empty($password) )
        {
            $_SESSION['error']['pass'] = "please enter password";
        }
        return $_SESSION['error'];
    }
?>