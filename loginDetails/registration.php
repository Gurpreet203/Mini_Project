<?php
    include 'validation.php';
    PageValidate();

// to check alll fields are filled by user or not
// first name validation
    if( isset($_POST['submit']) )
    {
        session_start();
        $_SESSION['error'] = array();

        if( !empty($_POST['fname'])  )
        {
            $name = ltrim($_POST['fname']);
            if( is_numeric($name) || preg_match('/[^a-z_+-0-9]/i', $name))
            {
                $_SESSION['error']['fname'] = "please enter correct first name";
            }
            else
            {
                for( $i=0 ; $i<strlen($name) ; $i++)
                {
                    if($name[$i]==" ")
                    {
                        $_SESSION['error']['fname'] = "please enter only first name";
                        break;
                    }
                }
            }
            
        }
        else
        {
            $_SESSION['error']['fname'] = "please enter first name";
        }

// last name validation

        if( !empty($_POST['lname']) )
        {
            $name = ltrim($_POST['lname']);
            if( is_numeric($name) || preg_match('/[^a-z_+-0-9]/i', $name) )
            {
                $_SESSION['error']['lname'] = "please enter correct last name";
            }
            else
            {
                for( $i=0 ; $i<strlen($name) ; $i++)
                {
                    if($name[$i]==" ")
                    {
                        $_SESSION['error']['lname'] = "please enter only last name";
                        break;
                    }
                }
            }
        }
        else
        {
            $_SESSION['error']['lname'] = "please enter first name";
        }

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
            $_SESSION['User'][] = $_POST;
            $curr = count( $_SESSION['User'] );
            array_unshift( $_SESSION['User'][$curr-1] , $curr );

            header("location:LogIn.php");
        }
    }
?>