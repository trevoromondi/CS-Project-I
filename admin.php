<?php
session_start();
if(isset($_SESSION['officer_id'])){

    echo "<p align=right> WELCOME: OFFICER ID-".$_SESSION['officer_id'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" href="admin.css">
	</head>
	<body>
		<form>
		<div id="header">
			<center>
            <img class="logo" src="./assets/emergency-call.png"><br><p class="big-text">Welcome to Admin Panel</p>
			</center>
		</div>
		<div id="sidebar">
			<ul>
				<li><button type="submit" id="add"name="add"style="margin-right: 60px"><a href="#">ADD DEFAULT ALERT</button></li>
				<li><button type="submit" id="delete"name="delete"style="margin-right: 60px"><a href="#">VIEW DEFAULT ALERTS</button></li>
				<li><button type="submit" id="update"name="update"style="margin-right: 60px"><a href="#">EDIT DEFAULT ALERTS</button></li>
				<li><button type="submit" id="view"name="view"style="margin-right: 60px"><a href="table.php">VIEW USERS</button></li></li></a>
				<li><button type="submit" id="user"name="user"style="margin-right: 60px"><a href="process_user.php">EDIT/DISABLE USERS</button></li></li></a>
				<li><button type="logout" id="logout"name="logout"style="margin-right: 60px"><a href="logout.php">LOGOUT</button></li></li></a>
			</ul>


 		</div>
		<div id="data"><br>
 		</div>
 		</form>
	</body>
</html>