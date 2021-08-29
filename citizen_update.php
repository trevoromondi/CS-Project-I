<?php

session_start();

if (!isset($_SESSION["id_number"])) {

    header("Location: citizen_login.php");
}

include 'db_connect.php';

if (isset($_POST["submit"])) {
    $id_number = mysqli_real_escape_string($conn, $_POST["id_number"]);
    $names = mysqli_real_escape_string($conn, $_POST["names"]);
    $citizen_email = mysqli_real_escape_string($conn, $_POST["citizen_email"]);
    $phone_number= mysqli_real_escape_string($conn, $_POST["phone_number"]);
    $county= mysqli_real_escape_string($conn, $_POST["county"]);
    $pwd = mysqli_real_escape_string($conn, md5($_POST["pwd"]));
    $pwd2 = mysqli_real_escape_string($conn, md5($_POST["pwd2"]));

    if ($pwd === $pwd2) {
        // $photo_name = $_FILES["photo"]["name"];
        // $photo_tmp_name = $_FILES["photo"]["tmp_name"];
        // $photo_size = $_FILES["photo"]["size"];
        // $photo_new_name = $photo_name;
        // $file_path="uploads/";
        // $path=$file_path.$photo_new_name;

        // if ($photo_size > 5242880) {
        //     echo "<script>alert('Photo is very big. Maximum photo uploading size is 5MB.');</script>";
        // } else {
            $sql = "UPDATE citizens SET names='$names',id_number='$id_number',citizen_email='$citizen_email',phone_number='$phone_number',county='$county'WHERE id_number='{$_SESSION["id_number"]}'";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('Profile Updated successfully.');</script>";
                echo '<script>window.location="citizenprofile.php"</script>';
               // move_uploaded_file($photo_tmp_name, "uploads/".$photo_new_name);
            } else {
                echo "<script>alert('Profile can not Updated.');</script>";
                echo  $conn->error;
            }
        
    } else {
        echo "<script>alert('Password not matched. Please try again.');</script>";
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
    <link rel="stylesheet" href="style.css">

    <title>Update Profile</title>

  </head>
  <body>
      <section class="form my-4 mx-5">
          <div class="container">
              <div class="row g-0">
                  <div class="col-lg-5">
                      <img src="./assets/fire.jpg" class="img-fluid" alt="">
                  </div>
                  <div class="col-lg-7 px-5 pt-5">
                      <h1 class="font-weight-bold py-3">Emergency Alert System</h1>
                      <h4>Update your profile</h4>
                      <form method="POST" action="" enctype="multipart/form-data">
                      <?php 
                      $sql = "SELECT * FROM citizens WHERE id_number='{$_SESSION["id_number"]}'";
                      $result = mysqli_query($conn, $sql);
                      if (mysqli_num_rows($result) > 0) {
                          while ($row = mysqli_fetch_assoc($result)) {
                              ?>

                            <div class="form-row">
                              <div class="col-lg-7">
                                  <input type="text" id="id_number" name="id_number" placeholder="National ID" value="<?php echo $row['id_number']; ?>"class="form-control my-3 p-4">
                              </div>
                          </div>
                          <div class="form-row">
                              <div class="col-lg-7">
                                  <input type="text" id="names" name="names" placeholder="Full Name" value="<?php echo $row['names']; ?>"class="form-control my-3 p-4">
                              </div>
                          </div>
                          <div class="form-row">
                              <div class="col-lg-7">
                                  <input type="text" id="phone_number" name="phone_number" placeholder="Phone Number" value="<?php echo $row['phone_number']; ?>"class="form-control my-3 p-4">
                              </div>
                          </div>
                          <div class="form-row">
                              <div class="col-lg-7">
                                  <input id="citizen_email" type="email" name="citizen_email" placeholder="Email Address" value="<?php echo $row['citizen_email']; ?>"class="form-control my-3 p-4">
                              </div>
                          </div>
                          <div class="form-row">
                              <div class="col-lg-7">
                                  <input type="text" id="county" name="county" placeholder="County of Residence" value="<?php echo $row['county']; ?>"class="form-control my-3 p-4">
                              </div>
                          </div>
                          
                          <div class="form-row">
                              <div class="col-lg-7">
                                  <input id="pwd" type="password" name="pwd" placeholder="Password" class="form-control my-3 p-4" >
                              </div>
                          </div>
                          <div class="form-row">
                              <div class="col-lg-7">
                                  <input id="pwd2" type="password" name="pwd2"placeholder="Confirm Password" class="form-control my-3 p-4" >
                              </div>
                          </div>
                          <?php
                          }
                        }
                        ?>

                          <div class="form-row">
                              <div class="col-lg-7">
                              <button type="submit" name="submit" class="btn1 mt-3 mb-5">Update Profile</button>
                            </div>
                          </div>
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
