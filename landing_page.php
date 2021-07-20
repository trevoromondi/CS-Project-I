<?php
require_once('db_connect.php');
session_start();
echo "<p align=right> WELCOME: OFFICER ID-".$_SESSION['officer_id'];
echo "<br><br>";
$officer_id='officer_id';
error_reporting(E_ALL ^ E_NOTICE);
?>