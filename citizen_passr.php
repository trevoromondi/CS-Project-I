<?php
require_once("db_connect.php");
if(isset($_POST["password_reset"]))
{
    $id_number=$_POST['id_number'];
    $pwd=$_POST['pwd'];
    $pwd2=md5($pwd);

   
    $update="UPDATE citizens SET pwd='$pwd2' where id_number='$id_number'";
    if(mysqli_query($conn,$update))
    {
        echo '<script>alert("SUCCESS")</script>';
        echo '<script>window.location="citizen_login.php"</script>';
    }
    else
    {
        echo '<script>alert("ERROR")</script>';
        echo '<script>window.location="citizen_passr.php"</script>';
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

    <title>RED | Password Reset</title>

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
                      <h4>Reset Password</h4>           
                    <form method="post" action="">
                          <div class="form-row">
                              <div class="col-lg-7">
                                  <input id="id_number" name="id_number" placeholder="National ID" type="text" class="form-control my-3 p-4">
                              </div>
                          </div>
                          <div class="form-row">
                              <div class="col-lg-7">
                                  <input id ="pwd" name="pwd" type="password" placeholder="New Password" class="form-control my-3 p-4" >
                              </div>
                          </div>
                          <div class="form-row">
                              <div class="col-lg-7">
                                  <input type="submit" name="password_reset" class="btn1 mt-3 mb-5">
                              </div>
                          </div>
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