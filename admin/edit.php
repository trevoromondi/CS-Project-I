<?php 
    require_once('db_connect.php');
    $officer_id = $_GET['officer_id'];
    $sql = "SELECT officer_id, officer_name,officer_email,role,pwd FROM user WHERE officer_id='".$officer_id."'";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn)); 
    if (mysqli_num_rows($result) != 1) {
        die('Email not in database');
    }
    $data = mysqli_fetch_assoc($result);
    $option=$data['role'];

?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit</title>
</head>
<body>
        <form action="process_edit.php" method=POST>

            <label for="officer_id">Officer ID:</label>
            <input type="text" name="officer_id" value="<?= $data['officer_id']?>" id="officer_id"placeholder="Enter Officer ID"><br><br>
            
            <label for="officer_name">Full Names:</label>
            <input type="text" name="officer_name" value="<?= $data['officer_name']?>" id="officer_name"placeholder="Enter Full Names"><br><br>

            <label for="officer_email">Email:</label>
            <input type="text" name="officer_email" value="<?=$data['officer_email']?>" id="officer_email"placeholder="Enter Email"><br><br>

            <label for="role">Admin:</label>
            <input type="radio" name="role" value="Admin" <?php if($option=="Admin") echo 'checked="checked"'; ?> id="Admin">
            <label for="role">Client:</label>
            <input type="radio" name="role" value="Client" <?php if($option=="Client") echo 'checked="selected"'; ?>id="Client"><br><br>

            <label for="pwd">Password</label>
            <input type="password" name="pwd"  id="pwd" placeholder="Enter Password"><br><br>

            <button type="update" id="update"name="update"style="margin-right: 60px">UPDATE</button><br><br>
        </form>
</body>
</html>