<?php
if(isset($_POST['password_reset']) && $_POST['officer_id'] && $_POST['pwd'])
{
  $officer_id=$_POST['officer_id'];
  $pwd=$_POST['pwd'];
  $mysqli=NEW MySQLi('localhost','root','','cs_project');
  //mysql_select_db('cs_project');
  $select= $mysqli->query("UPDATE user set pwd='$pwd' where officer_id='$officer_id'");
}
?>