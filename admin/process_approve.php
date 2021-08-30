<?php
require_once('db_connect.php');
require '../vendor/autoload.php';
//use autoload;

if(isset($_POST['submit']))
{
    $officer_id=$_POST["officer_id"];
    $alertID=$_POST["alertID"];
    $alertDescription=$_POST["alertDescription"];
    $status=$_POST["status"];

    $sql = "UPDATE `alert` SET `alertID`='$alertID',`alertDescription`='$alertDescription',`status`= '$status',`officer_id`='$officer_id' WHERE alertID='$alertID'";
    
    if($status=='Approved')
    {
      
      $phoneNumbers=array();
      if(mysqli_query($conn, $sql))
      {
          //$conn = new mysqli('localhost','root','','cs_project');
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
          //print_r($phoneNumbers);
          $client = new MessageBird\Client('JcxdYSxeEs3kuG8bmHJjVaP05');
       
         //echo "Success";
         //print_r($client);

        //if($status='Approved')
        //{
            $message = new MessageBird\Objects\Message;
            $message->originator = '+254706253490';
            $message->recipients = $phoneNumbers;
            $message->body = $alertDescription;
            $response = $client->messages->create($message);
            //print_r($response);
        
            echo '<script>alert("Message Approved and Sent")</script>';
            echo '<script>window.location="messagesent.php"</script>';

      }else
         {
            echo '<script>alert("Try Again")</script>';
            //echo "something went wrong ";
         }

    }else if($status=='Denied')
    {
      if(mysqli_query($conn, $sql))
      {
      echo '<script>alert("The message will not be sent out to the public")</script>';
      echo '<script>window.location="alerts.php"</script>';
      }
    }
}
?>
