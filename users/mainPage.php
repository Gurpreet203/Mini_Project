<?php
    session_start();

// to check only logged in user can access this page (not access with url if user is not logged in) 
    if(isset($_SESSION['loggedin']))
    {
        if($_SESSION['loggedin']==false)
        {
            header("location:../loginDetails/LogIn.php");
        }
    }
    else{
        header("location:../loginDetails/signup.php");
    }
?>


<html>
<head>
    <link rel="stylesheet" href="../CSS/styleTable.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<body>
    <nav>
        <h2>Welcome <?php if(isset($_SESSION['uname'])){echo strtoupper($_SESSION['uname']);}?></h2>
    </nav>
</body>
</html>


<?php
    

    echo "<h1 style=\"text-decoration:underline;\">All Users Data</h1>";
    echo "<table cellspacing=0> <tr><th>Unique Id </th> <th>First Name</th> <th>Last Name</th> <th>Email</th> <th>Edit</th> <th>Delete</th> </tr>";
   
       
    foreach( $_SESSION['User'] as $value ) 
    {
        echo "<tr>";

        foreach($value as $k=>$val)
        {
            if( $k=='pass' )
            {
                break;
            }

            echo "<td>".$val."</td>";

        }
        echo "<td> <a href=\"edit.php?id=".$value[0]."\" class=\"edit\"><i class=\"bi bi-pencil-square\"></i> Edit</a> 
        </td>  <td> <a href=\"delete.php?id=".$value[0]."\" class=\"delete\"><i class=\"bi bi-trash\"></i> Delete</a> </td>";

        echo "</tr>";

    }
    
    echo "</table>";
    if(empty($_SESSION['User']))
    {
        echo "<h1>Record Not Found</h1>";
    }
    
// log out button who also tell other pages that user is logged out

    echo "<a href=\"../loginDetails/loginCheck.php?login=false\" class=\"logout\"><i class=\"bi bi-box-arrow-left\"></i> LogOut</a>";
    
?>