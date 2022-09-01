<?php
session_start();
if(isset($_POST['submit']))
{
    $id = (int) filter_var($_POST['submit'],FILTER_SANITIZE_NUMBER_INT);
    foreach($_SESSION['User'] as $key=>$value)
    {
        if($value[0] == $id)
        {
            $_SESSION['User'][$key] = $_POST;
            array_unshift($_SESSION['User'][$key],$id);
            header("location:mainPage.php");
            break;
        }
    }
}
?>