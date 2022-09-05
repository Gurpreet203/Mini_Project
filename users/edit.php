<?php
    session_start();
    include '../loginDetails/validation.php';
// validate the user    
    if(!PageValidate() )
    {
        header("location:../loginDetails/signup.php");
    }

// here we search for user id and store it in some temperary variable so that it's value can be shown in fields
    global $temp ;
    $temp = array();
    $id = $_GET['id'];
    foreach($_SESSION['User'] as $key=>$value)
    {
        if($value[0] == $id)
        {
            $temp = $value;
            break;
        }
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

    <form action="editContent.php" method="post">
        <h1>Edit Account</h1>
        <label for="fname">First Name</label>
        <input type="text" name="fname" class="fname" value=<?php global $temp;echo empty($temp['fname']) ? "FirstName" :  $temp['fname']?>>
        <label for="lname">Last Name</label>
        <input type="text" name="lname" class="lname" value=<?php global $temp;echo empty($temp['lname']) ? "LastName" :  $temp['lname']?>>
        <label for="email">Email</label>
        <input type="email" name="email" class="email" value=<?php global $temp;echo empty($temp['email']) ? "email" :  $temp['email']?>>
        <label for="pass">Password</label>
        <input type="password" name="pass" class="pass" value=<?php global $temp;echo empty($temp['pass']) ? null :  $temp['pass']?>>
        <input type="submit" name="submit" value=<?php echo "EditID=".$_GET['id']?>>
        <a href="mainPage.php">Go Back</a>
    </form>
</body>
</html>