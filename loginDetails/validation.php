<?php
global $error;
$error=array();

// this function is use to restrict user trying to access other pages without log out

    function PageValidate()
    {
        if(isset($_SESSION['loggedin']))
        {
            if($_SESSION['loggedin']==true)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }

// this function is for make log in page heading dynamic like if user not found show user not found otherwise user inserted etc.
    function userStatus( $tempSession )
    {
        $temp =null;
        if(!empty($tempSession['error']['found']) && !isset($tempSession['activity']))
        {
            $temp = $tempSession['error']['found'];
        }

        elseif(!empty($tempSession['User']) && !isset($tempSession['activity']))
        {
            $temp =  "User Inserted Successfully";
        }

        elseif(isset($_GET['already']) )
        {
            $temp = "Previous User";
        }
        elseif(isset($tempSession['activity']) )
        {
            $temp = $tempSession['activity'];
        }
        return $temp;
    }


// this function is for check if the user fill email and password or not

    function EmailPassCheck($email , $password)
    {
        global $error;
        if( empty($email) )
        {
            $error['email'] = "please enter Email";
        }
        else
        {
            if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $error['email'] = "please enter valid Email";
            }
        }

        if( empty($password) )
        {
            $error['pass'] = "please enter password";
        }
        return $error;
    }

// name validation function

    function nameValidate($name , $key)
    {
        global $error;
        if( !empty($name)  )
        {
            $nam = ltrim($name);
            if( is_numeric($nam) || preg_match('/[^a-z_+-0-9]/i', $nam) )
            {
                $error[$key] = "please enter correct $key ";
            }
            else
            {
                for( $i=0 ; $i<strlen($nam) ; $i++)
                {
                    if($nam[$i]==" ")
                    {
                        $error[$key] = "please enter only $key ";
                    }
                }
            }
            
        }
        else
        {
           $error[$key] = "please enter $key ";
        }

        return $error;
    }
?>