<?php
session_start();
session_destroy();
unset($_SESSION['officer_id']);
header("location:login.php");
?>