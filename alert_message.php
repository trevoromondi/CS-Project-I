<?php
session_start();

if (!isset($_SESSION["officer_id"])) {

    header("Location: landing.php");
}

if(isset($_POST["submit"]))
{
    $alertType=$_POST["alertType"];
    $county=$_POST["county"];
    $alertDescription=$_POST["alertDescription"];
    $officer_id=$_POST["officer_id"];
    
    
    //Connect to DB
    $mysqli=NEW MySQLi('localhost','root','','cs_project');
    $insert= $mysqli->query ("INSERT INTO alert(alertType, county, alertDescription,officer_id) VALUES('$alertType', '$county','$alertDescription','$officer_id')");
    
    if($insert)
    {
        echo '<script>alert("SUCCESS")</script>';
        echo '<script>window.location="landing.php"</script>';
    }else
    {
        echo '<script>alert("FAIL")</script>';
    }  
}
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        

        <link rel="stylesheet" href="landing.css">
        
        <title>Create Message</title>
    </head>

    <body>
    
    <nav class="navbar navbar-style">
              <div class="container">
                  <div class="navbar-header">
                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#micon">
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>  
                      </button>
                      <a href="#">
                          <img class="logo" src="./assets/emergency-call.png">
                      </a>
                  </div>

                  <div class="collapse navbar-collapse" id="micon">

                  <ul class="nav navbar-nav navbar-right">
                      <li><a href="updateprofile.php">Profile</a></li>
                      <li><a href="#">WELCOME: OFFICER ID- <?php echo $_SESSION['officer_id']; ?> </a></li>
                      <li><a type="logout" name="logout" class="btn1" href="logout.php">Logout</a></li>
                  </ul>
                </div>
              </div>

          </nav>
        <div class="container-fluid">
        <div class="container">
            <div>
                <h2 class="text-center mb-5 shadow-sm p-3">Emergency Alert Message</h2>
            </div>

      <form method="POST" action="">
            <div class="row">
                <div class="col-md-7 shadow rounded p-5">
                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label">Type of Emergency Alert</label>
                            <input type="text" name="alertType" class="form-control" placeholder="Type of Emergency Alert" required>
                        </div>
                        <div class="col mb-3">
                            <label class="form-label">County</label>
                            <input type="text" name="county" class="form-control" placeholder="Alert County" required>
                        </div>

                    </div>

                    <div class="mb-3">
                        <label class="form-label">Message</label>
                         <textarea name="alertDescription" class="form-control" placeholder="Input a brief message below" rows="3" required></textarea>
                    </div>

                    <div class="mb-3">
                            <label class="form-label">Reporting Officer ID</label>
                            <input type="text" name="officer_id" class="form-control" value="<?php echo $_SESSION['officer_id']; ?>">
                </div>


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Submit
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Send Alert Message</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Are you sure you want to send this message
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" name="submit" class="btn btn-primary">Send Message</button>
        </div>
      </div>
    </div>
  </div>

                </div>

                <div class="col-md-5 bg-light">
                <div class="ml-5 ">
                    <img src="./assets/fr.jpg" alt="" class="img-fluid">
                </div>
                </div>

                
               

            </div>
</form>
        </div>
    </div>
        
        
        
        <!-- Optional JavaScript; choose one of the two! -->
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        
        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        -->
    </body>
</html>