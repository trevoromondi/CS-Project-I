<?php
require_once('db_connect.php');
require '../vendor/autoload.php';

if(isset($_POST['submit']))
{
    $officer_id=$_POST["officer_id"];
    $alertID=$_POST["alertID"];
    $alertDescription=$_POST["alertDescription"];
    $status=$_POST["status"];

    $sql = "UPDATE `alert` SET `alertID`='$alertID',`alertDescription`='$alertDescription',`status`= '$status',`officer_id`='$officer_id' WHERE alertID='$alertID'";
      
      $phoneNumbers=array();
      if(mysqli_query($conn, $sql))
      {
          $result = $conn->query("SELECT phone_number FROM citizens");
          if ($result->num_rows > 0) 
          {
              // output data of each row
              while($row = $result->fetch_assoc()) 
              {
                array_push($phoneNumbers, $row['phone_number']);
              }
          }else
          {
              echo "0 results";
          }
          //Messaging API
          $client = new MessageBird\Client('FZudI4SK9uLS61g0BiGy9JiuJ');

            $message = new MessageBird\Objects\Message;
            $message->originator = '+2547********';
            $message->recipients = $phoneNumbers;
            $message->body = $alertDescription;
            $response = $client->messages->create($message);
        
            echo '<script>alert("Message Approved and Sent")</script>';
            echo '<script>window.location="messagesent.php"</script>';

      }else
         {
            echo '<script>alert("Try Again")</script>';

         }

    
}
?>
