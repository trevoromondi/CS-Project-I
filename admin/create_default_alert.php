<?php
session_start();

if (!isset($_SESSION["officer_id"])) {

    header("Location: index.php");
}

if(isset($_POST["submit"]))
{
    $officer_id=$_POST["officer_id"];
    $alert_type=$_POST["alert_type"];
    $alert_message=$_POST["alert_message"];
    
    //Connect to DB
    $mysqli=NEW MySQLi('localhost','root','','cs_project');
    $insert= $mysqli->query ("INSERT INTO default_alerts(alert_type, alert_message) VALUES('$alert_type','$alert_message')");
    
    if($insert)
    {
        echo '<script>alert("SUCCESS")</script>';
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
                    
                    <a href="landing_page.php">
                        <img class="logo" src="../assets/emergency-call.png" height="48px" padding="2px 10px">
                    </a>
                </div>
                
                <div class="collapse navbar-collapse" id="micon">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="landing_page.php">Home</a></li>
                        <li><a href="updateprofile.php">Profile</a></li>
                        <li><a type="logout" name="logout" class="btn1" href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <div class="container mt-5">
            <h1>Create Message</h1>
            <form method= "POST" action="" class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Officer ID</label>
                    <input type="text" name="officer_id" class="form-control" value="<?php echo $_SESSION['officer_id']; ?>">
                </div>
                
                
                <div class="col-md-12">
                <label class="form-label">Alert Type</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="alert_type" id="exampleRadios1" value="Red" checked>
                        <label class="form-check-label" for="exampleRadios1">Red</label>
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="alert_type" id="exampleRadios2" value="Amber">
                        <label class="form-check-label" for="exampleRadios2">Amber</label>
                    </div>
                    
                </div>
                
                <div class="col-md-12">
                    <label class="form-label">Message</label>
                    <textarea name="alert_message" class="form-control" rows="3" required></textarea>
                </div>
                
                <div class="col-md-12">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
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