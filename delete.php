<?php
session_start();
include("db_connect.php");

if(isset($_POST['delete_btn']))
{
    $id_number=$_SESSION['id_number'] ?? "";

    $delete="DELETE FROM citizens WHERE id_number='".$id_number."'";
    $delete_run=mysqli_query($conn,$delete);
    
      if($delete_run)
      {
            echo '<script>alert("ACCOUNT UNSUBSCRIBED")</script>';
            echo '<script>window.location="citizen_register.php"</script>';
      }
      else
      {
        echo '<script>alert("ACCOUNT NOT UNSUBSCRIBED")</script>';
            echo '<script>window.location="citizen_login.php"</script>';
      }

}
?>
<html>
    <head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
</body>
</html>
