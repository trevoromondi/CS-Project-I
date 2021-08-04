<!DOCTYPE html>
<html>
<head>
	<title>EDIT/DELETE USER</title>
	<link rel="stylesheet" href="table.css">
	</head>
	<body>
		<form action=""method="post">

		<table>
		<tr>
            <th>Officer ID</th>
			<th>Officer Name</th>
			<th>Email</th>
			<th>Edit</th>
			<th>Delete</th>
			
		</tr>
		<?php
		$conn=mysqli_connect("localhost","root","","cs_project");

		if($conn){
			//echo"Connected Successfully";
		}
		else{
			echo"Did Not Connect ".mysqli_connect_error();
		}

		$sql="SELECT officer_id,officer_name,officer_email,pwd from user";
		$result=$conn->query($sql);

		if($result->num_rows>0)
		{
			while($row=$result->fetch_assoc())
			{

				echo"
				<tr>
				<td>".$row["officer_id"]."</td>
				<td>".$row["officer_name"]."</td>
				<td>".$row["officer_email"]."</td>
				<td><button><a href='edit.php?officer_id=$row[officer_id]'>Edit</button></td>
				<td><button><a href='process_disable.php?officer_id=$row[officer_id]'>Disable</button></td>
				</tr>
				";


			}
			echo"</table>";
		}
		else
		{
			echo"No results to display";

		}
		$conn->close();

		?>
	</table>
	<button type="back" id="back"name="back"style="margin-right: 60px"><a href="admin.php">BACK</button>
</form>
</body>
</html>