<?php 
    require_once('db_connect.php');
    $alert_id = $_GET['alert_id'];
    $sql="SELECT * from default_alerts WHERE alert_id='".$alert_id."'";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn)); 
    if (mysqli_num_rows($result) != 1)
     {
        print_r ($result);
        die('Alert not in database');
    }
    $data = mysqli_fetch_assoc($result);
    $option=$data['alert_type'];
    

?>
<!DOCTYPE html>
<html>
<head>
    <title>RED | Edit Alerts</title>
</head>
<body>
        <form action="process_edit_alerts.php" method=POST>

            <label for="alert_id">Alert ID:</label>
            <input type="text" name="alert_id" value="<?= $data['alert_id']?>" id="alert_id"placeholder="Enter Alert ID"><br><br>

            <label for="alert_type">Amber:</label>
            <input type="radio" name="role" value="Amber" <?php if($option=="Amber") echo 'checked="checked"'; ?> id="Amber">
            <label for="alert_type">Red:</label>
            <input type="radio" name="role" value="Red" <?php if($option=="Red") echo 'checked="selected"'; ?>id="Red"><br><br>

            <label for="alert_message">Message:</label>
            <input type="text" name="message" value="<?= $data['alert_message']?>" id="alert_message"placeholder="Message"><br><br>

            <button type="update" id="update"name="update"style="margin-right: 60px">UPDATE</button><br><br>
        </form>
</body>
</html>