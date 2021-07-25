<?php
session_start();
if(isset($_SESSION['officer_id'])){

    echo "<p align=right> WELCOME: OFFICER ID-".$_SESSION['officer_id'];
}

error_reporting(E_ALL ^ E_NOTICE);
?>

<!doctype html>
<html>
    <head>
        <title>Landing Page</title>
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
                      <li><a href="landing_page.php">Home</a></li>
                      
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
                      <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                      <a class="btn btn_first" href="#">Create message</a>
                      <a class="btn btn_second" href="passwordreset.php">Change Password</a>
                  </div>
                  <div class="col-sm-6 banner-image">
                      <img src="./assets/heli.jpg" class="img-responsive">
                  </div>
              </div>
          </div>
          
        </header>

    </body>
</html>
