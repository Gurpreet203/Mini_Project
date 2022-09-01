<?php
    session_start();
    $id = $_GET['id'];
    foreach($_SESSION['User'] as $key=>$value)
    {
        if($value[0] == $id)
        {
            unset($_SESSION['User'][$key]);
            header("location:mainPage.php");
            break;
        }
    }
?>