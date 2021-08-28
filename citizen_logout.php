<?php
session_start();
session_destroy();
unset($_SESSION['id_number']);
header("location:citizen_login.php");
?>