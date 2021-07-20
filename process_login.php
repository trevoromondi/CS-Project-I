<?php
session_start();
require_once("db_connect.php");
echo "<br>";

if(isset($_POST["login"]))
{
    $officer_id=$_POST["officer_id"];
    $pwd=$_POST["pwd"];

    $sql="SELECT * FROM user where officer_id='$officer_id' and pwd='$pwd'";
	$results=mysqli_query($conn,$sql);

    $_SESSION['officer_id']=$officer_id;
	header('location:landing_page.php');
    

}

?>