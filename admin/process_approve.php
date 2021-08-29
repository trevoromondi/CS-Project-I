<?php
require_once('db_connect.php');

if(isset($_POST['update'])){

    $officer_id=$_POST["officer_id"];
    $alertID=$_POST["alertID"];
	$alertDescription=$_POST["alertDescription"];
    $status=$_POST["status"];
	
    $sql = "UPDATE `alert` SET `alertID`='$alertID',`alertDescription`='$alertDescription',`status`= '$status',`officer_id`='$officer_id' WHERE alertID='$alertID'";

    if(mysqli_query($conn, $sql)){
        echo '<script>alert("Message Approved and Sent")</script>';
       // header('location: view_users.php');
        echo '<script>window.location="alerts.php"</script>';
    }else{
        echo '<script>alert("Try Again")</script>';
        echo "something went wrong ";
    }
}else{
    echo "invalid";
}

?>
