<?php
session_start();
if(isset($_SESSION['officer_id'])){

    //echo "<p align=right> WELCOME: OFFICER ID-".$_SESSION['officer_id'];
}
else{ 
    header("Location: login.php");
  }

error_reporting(E_ALL ^ E_NOTICE);
?>

<!doctype html>
<html>
    <head>
        <title>RED | Welcome</title>
        <link rel="stylesheet" type="text/css" href="landing.css">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>

    <body>
        <header class="header">
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
                      <li><a href="userprofile.php">Profile</a></li>
                      <li><a href="#">WELCOME: OFFICER ID- <?php echo $_SESSION['officer_id']; ?> </a></li>
                      <li><a type="logout" name="logout" class="btn1" href="logout.php">Logout</a></li>
                  </ul>
                </div>
              </div>

          </nav>
          
          <div class="container">
              <div class="row">
                  <div class="col-sm-6 banner-info">
                      <h1>Red: Emergency Alert</h1>
                      <p class="big-text">Keep you safe</p>
                      <p>This emergency alert system interface will give you the ability to send out emergency alert messages to citizens. Click below to construct a message.</p>
                      <br>
                      <br>
                      <br>

                      <form action="" method="POST">
          
                        <a type="button" name="button" href="alert_message.php"class="btn btn-primary-responsive">Create Alert Message</a>

                    </form>


                    
                      <!--<a class="btn btn_first" href="createmessage.php">Create message</a>-->
                    </div>
                  <div class="col-sm-6 banner-image">
                      <img src="./assets/heli.jpg" class="img-responsive">
                  </div>
              </div>
          </div>
          
        </header>
        

        <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; RED: Emergecy Alert System 2021</span>
          </div>
        </div>
      </footer>

    </body>
</html>
