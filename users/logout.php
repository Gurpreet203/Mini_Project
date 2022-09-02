<?php
// to check if user press log out button in data view page 

    session_start();
    if(isset($_SESSION['loggedin']))
    {
        if($_SESSION['loggedin']==true)
        {
            unset($_SESSION['loggedin']);
            $_SESSION['activity'] = "successfully LogOut";
            header("location:../loginDetails/LogIn.php");
        }
    }
?>