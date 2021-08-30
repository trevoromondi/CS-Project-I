<?php

session_start();

if (!isset($_SESSION["id_number"])) {

    header("Location: citizen_login.php");
}

include 'db_connect.php';

        
$sql = "SELECT id_number,names,phone_number,citizen_email,county from citizens";
$result = mysqli_query($conn, $sql);

if($result)
{
    while($row=mysqli_fetch_assoc($result))
    {

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">

    <title>Update Profile</title>

  </head>
  <body>
      
                      <?php 
                      $sql = "SELECT * FROM citizens WHERE id_number='{$_SESSION["id_number"]}'";
                      $result = mysqli_query($conn, $sql);
                      if (mysqli_num_rows($result) > 0) {
                          while ($row = mysqli_fetch_assoc($result)) {

                              ?>
                  <section class="form my-4 mx-5">
                        <div class="container">
                        <div class="row g-0">
                        <div class="col-lg-5">
                      <img src="./assets/fire.jpg" class="img-fluid" class="img-fluid" alt="">
                      
                      
                  </div>
                  <div class="col-lg-7 px-5 pt-5">
                      <h1 class="font-weight-bold py-3">Emergency Alert System</h1>
                      <h4>User Profile</h4>
                      <form method="POST" action="" enctype="multipart/form-data">
                      <div class="form-row">
                              <div class="col-lg-7">
                                  <label>National ID</label>
                                  <h6 id="id_number" name ="id_number" type="text" placeholder="National ID" class=""><?php echo $row['id_number']; ?></h6>
                              </div>
                          </div>
                          <br>
                          <div class="form-row">
                              <div class="col-lg-7">
                              <label>Name</label>
                                  <h6 type="text" id="names" name="names" placeholder="Name" value="" class="" ><?php echo $row['names']; ?></h6>
                              </div>
                          </div>
                          <br>
                          <div class="form-row">
                              <div class="col-lg-7">
                              <label>Phone Number</label>
                                  <h6 type="text" id="phone_number" name="phone_number" placeholder="Phone Number" value=""class="" ><?php echo $row['phone_number']; ?></h6>
                              </div>
                          </div>
                          <br>
                          <div class="form-row">
                              <div class="col-lg-7">
                              <label>Email</label>
                                  <h6 id="citizen_email" type="email" name="citizen_email" placeholder="Email Address" value="" class=""><?php echo $row['citizen_email']; ?></h6>
                              </div>
                          </div>
                          <br>
                          <div class="form-row">
                              <div class="col-lg-7">
                              <label>County of Residence</label>
                                  <h6 type="text" id="county" name="county" placeholder="County Residence" value=""class="" ><?php echo $row['county']; ?></h6>
                              </div>
                          </div>
                          <br>
                          <!--<div class="form-row">
                              <div class="col-lg-7">
                                  <input id="pwd" type="password" name="pwd" placeholder="Password" class="form-control my-3 p-4" >
                              </div>
                          </div>
                          <div class="form-row">
                              <div class="col-lg-7">
                                  <input id="pwd2" type="password" name="pwd2"placeholder="Confirm Password" class="form-control my-3 p-4" >
                              </div>
                          </div>
                          <div class="form-row">
                              <div class="col-lg-7">
                                  <input id="photo" type="file" name="photo" accept="image/*" class="form-control my-3 p-4" >
                              </div>
                          </div>-->
                          <?php
                          }
                        }
                    }
                }
                        ?>

                          <div class="form-row">
                              <div class="col-lg-7">
                              <a href="citizen_update.php" class="btn btn-primary ">Update Profile</a>
                              <a href="citizen_passr.php" class="btn btn-primary ">Password Reset</a>
                            </div><br>
                            <a href="citizen.php" class="btn btn-primary ">Back</a>
                          </div>
                          <br>
                          <br>
                          <!--<p>Already have an account? <a href="login.php">Login here</a></p>-->
                      </form>

                  </div>
              </div>
          </div>
      </section>
    




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
