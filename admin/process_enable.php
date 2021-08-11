<?php
require_once('db_connect.php');
echo "<br>";
if(isset($_GET['officer_id']))
{
    $officer_id = $_GET['officer_id'];
    $verified=$_GET['verified'];
    $query="SELECT verified FROM user WHERE officer_id='$officer_id'";
    $resultSet=mysqli_query($conn,$query);
    

    if(mysqli_num_rows($resultSet)>0)
    {
        while($row = mysqli_fetch_array($resultSet)) 
        {

        echo '<script>window.confirm("Do you really want to verify this account?")</script>';
        {
            if($verified==0)
            {
                $update="UPDATE user SET verified = 1 WHERE officer_id='$officer_id'";

                if(mysqli_query($conn,$update))
                {
                    echo '<script>alert("Account Has Been Enabled")</script>';
                    echo '<script>window.location="view_users.php"</script>';
                }
                else
                {
                    echo '<script>alert("ERROR")</script>';
                    echo '<script>window.location="edit_users.php"</script>';
                }
            }
            else{
                echo '<script>alert("Account Has Already Been Verified")</script>';
            }
        
        }

        }
    }
}else{
    die('id not provided');
}
header("refresh:2,url=table.php");

echo "<br>";

echo"Wait as page refreshes";

?>