<?php
require_once("db_connect.php");
if (isset($_GET['vkey']))
{
    //Start verification process
    $vkey=$_GET['vkey'];

    $query="SELECT verified,vkey FROM user WHERE verified= 'Disabled' AND vkey='$vkey'";
    $resultSet=mysqli_query($conn,$query);
    echo $vkey;
    
    //print_r ($resultSet);
    if(mysqli_num_rows($resultSet)>0)
    {
        while($row = mysqli_fetch_array($resultSet)) 
        {
            echo $row['verified'];
            //Email Validation
            $update="UPDATE user SET verified = 'Enabled' WHERE vkey='$vkey'";
            
            if(mysqli_query($conn,$update))
            {    
            echo '<script>alert("Your Account Has Been Verified. You May Now Log In")</script>';
            echo '<script>window.location="login.php"</script>';
            
            }else{
                
                echo '<script>alert("This Account Is Invalid Or Already Verified ")</script>';
                echo '<script>window.location="verify.php"</script>';
            }
        }
        
    }else{
       // echo $mysqli->error;
        echo"ERROR".mysqli_error($conn);
    }
    
}
?>
<html>
    <head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
</body>
</html>