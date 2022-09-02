<?php
    include 'validation.php';
    PageValidate();

// to check all fields are filled by user or not

    if( isset($_POST['submit']) )
    {
        session_start();
        $_SESSION['error'] = array();

    //  first name validation

       $_SESSION['error'] = nameValidate($_POST['fname'] , 'fname');

    // last name validation

        $_SESSION['error'] = nameValidate($_POST['lname'], 'lname');

    //to validate email

        $_SESSION['error'] = EmailPassCheck($_POST['email'] , $_POST['pass']);

    // to check whether user exist or not if exist it gives error 

        if( isset($_SESSION['User']) )
        {
            foreach( $_SESSION['User'] as $key=>$value )
            {
                if( $_POST['email'] == $value['email'])
                {
                    $_SESSION['error']['email'] = "Email Already Exist";
                    break;
                }
            }
        }
      

    //to check if any error are come or not        

        if( !empty($_SESSION['error']) )
        {
           header("location:signup.php");

        }
        else
        {
            if( !empty($_SESSION['error']) )
            {
                unset($_SESSION['error']);
            }
            
            $_SESSION['User'][] = $_POST;
            $curr = count( $_SESSION['User'] );
            array_unshift( $_SESSION['User'][$curr-1] , $curr );

            header("location:LogIn.php");
        }
    }
?>