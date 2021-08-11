

<?php
//session_start();
include('db_connect.php');

$alert_id = $_POST["alert_id"];
$qry= mysqli_query($conn, "SELECT * from default_alerts WHERE alert_id='$alert_id'");
$data = mysqli_fetch_array($qry);

if(isset($_POST['update'])) // when click on Update button
{
    $alert_type = $_POST['alert_type'];
    $alert_message = $_POST['alert_message'];
	
    $edit = mysqli_query($conn,"UPDATE default_alerts set alert_type='$alert_type', alert_message='$alert_message' where alert_id='$alert_id'");
	
    if($edit)
    {
        mysqli_close($db); // Close connection
        header("location:view_default_alerts.php"); // redirects to all records page
        exit;
    }
    else
    {
        echo "ERROR";
    }    	
}




?>
<!DOCTYPE html>
<html>
<head>
    <title>RED | Edit Alerts</title>
</head>
<body>
        <form action="" method=POST>

            <label for="alert_id">Alert ID:</label>
            <input type="text" name="alert_id" value="<?= $data['alert_id']?>" id="alert_id"placeholder="Enter Alert ID"><br><br>

            <label for="alert_type">Amber:</label>
            <input type="radio" name="alert_type" value="Amber"  id="Amber">
            <label for="alert_type">Red:</label>
            <input type="radio" name="alert_type" value="Red" id="Red"><br><br>

            <label for="alert_message">Message:</label>
            <input type="text" name="alert_message" value="<?= $data['alert_message']?>" id="alert_message"placeholder="Message"><br><br>

            <button type="update" id="update"name="update"style="margin-right: 60px">UPDATE</button><br><br>
        </form>
</body>
</html>