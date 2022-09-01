<?php
    $invalid = 0;

    include 'validation.php';
    PageValidate();

// to check if user press log out button in data view page 
    if(isset($_GET['login']))
        {
            session_start();
            if(isset($_SESSION['loggedin']))
            {
                $_SESSION['loggedin']=false;
                
                header ('location:LogIn.php');
            }
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
                session_unset($_SESSION['error']);
            }

            foreach($_SESSION['User'] as $key=>$value)
            {
                if($value['email'] == $_POST['email'] && $value['pass'] == $_POST['pass'])
                {
                    $invalid = 0;
                    $_SESSION['loggedin'] = true;
                    $_SESSION['uname']= $value['fname'];
                    header("location:../users/mainPage.php");
                    break;
                }
                else{
                    $invalid++;
                }
            }
            
// display when user not found

            if($invalid>0)
            {
                $_SESSION['error']['found'] =  "User not Found";
                header("location:LogIn.php");
            }
        }
    }
?>