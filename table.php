<!DOCTYPE html>
<html>
<head>
	<title>Display Data</title>
	<link rel="stylesheet" href="table.css">
</head>
<body>
	<table>
    
		<tr>
			<th>Officer ID</th>
			<th>Officer Name</th>
			<th>Email</th>
            <th>Role</th>
            <th>Verified</th>
			<th>Alert History</th>
			
		</tr>
		<?php
		$conn=mysqli_connect("localhost","root","","cs_project");

		if($conn){
			//echo"Connected Successfully";
		}
		else{
			echo"Did Not Connect ".mysqli_connect_error();
		}

		$sql="SELECT officer_id,officer_name,officer_email,role,verified,pwd from user";
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
                <td>".$row["role"]."</td>
                <td>".$row["verified"]."</td>

				<td><button><a href='order_history.php?officer_id=$row[officer_id]'>Alert History</button></td>
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
</body>
</html>