<?php
require_once('db_connect.php');

if(isset($_POST['update'])){

    $officer_id=$_POST["officer_id"];
	$officer_email=$_POST["officer_email"];
    $officer_name=$_POST["officer_name"];
	$role=$_POST["role"];
    $pwd=$_POST['pwd'];
    $pwd2=md5($pwd);

    $sql = "UPDATE `user` SET `officer_id`='$officer_id',`officer_name`='$officer_name',`officer_email`= '$officer_email',`role`='$role',`pwd`='$pwd2'
           WHERE officer_id='$officer_id'";

    if(mysqli_query($conn, $sql)){
        echo '<script>alert("Account Has Been Updated Successfuly")</script>';
       // header('location: view_users.php');
        echo '<script>window.location="view_users.php"</script>';
    }else{
        echo '<script>alert("Try Again")</script>';
        echo "something went wrong ";
    }
}else{
    echo "invalid";
}

?>
