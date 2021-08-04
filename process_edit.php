<?php
require_once('db_connect.php');

if(isset($_POST['update'])){

    $officer_id=$_POST["officer_id"];
	$officer_email=$_POST["officer_email"];
    $officer_name=$_POST["officer_name"];
	$role=$_POST["role"];

    $sql = "UPDATE `user` SET `officer_id`='$officer_id',`officer_name`='$officer_name',`officer_email`= '$officer_email',`role`='$role' 
           WHERE officer_id='$officer_id'";

    if(mysqli_query($conn, $sql)){
        header('location: table.php');
    }else{
        echo "something went wrong ";
    }
}else{
    echo "invalid";
}

?>
