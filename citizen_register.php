<?php
if(isset($_POST["submit"]))
{
    //Get form data
    $id_number=$_POST["id_number"];
    $names=$_POST["names"]?? "";
    $phone_number=$_POST["phone_number"]?? "";
    $citizen_email=$_POST["citizen_email"]?? "";
    $county=$_POST["county"]?? "";
    $pwd=$_POST["pwd"]?? "";
    $pwd2=$_POST["pwd2"]?? "";


    //form validation

    if($pwd2 != $pwd)
    {
        echo '<script>alert("Your Passwords Do Not Match ")</script>';
        echo '<script>window.location="citizen.php"</script>';

    }
    else
    {
        //Connect to DB
    
        $mysqli=NEW MySQLi('localhost','root','','cs_project');

        //Sanitize the form data-value is stripped of characters that can be used for SQL Injection
        $id_number=$mysqli->real_escape_string($id_number);
        $names=$mysqli->real_escape_string($names);
        $phone_number=$mysqli->real_escape_string($phone_number);
        $citizen_email=$mysqli->real_escape_string($citizen_email);
        $county=$mysqli->real_escape_string($county);
        $pwd=$mysqli->real_escape_string($pwd);
        $pwd2=$mysqli->real_escape_string($pwd2);

        //Generate VKey-appended timestamp with officer id and hash it
       // $vkey=md5(time().$officer_id);

        //insert records into db
        $pwd=md5($pwd);
        $insert=$mysqli->query("INSERT INTO citizens(id_number,names,phone_number,citizen_email,county,pwd)VALUES('$id_number','$names','$phone_number','$citizen_email','$county','$pwd')");


        if($insert)
        {
            //echo "Success";
            //echo '<script>alert("SUCCESS")</script>';
            //echo '<script>window.location="register.php"</script>';

            //Send email
            $to=$citizen_email;
            $subject="Phone Number Registration";
            $message="Thank you for registering for the Emergency Alert System Service. You will now be able to receive SMS messages whenever an emergency arises. Click Here To <a href='http://localhost/CS-Project-I/CS-Project-I/citizen_login.php'>Log In to Account";
            $headers="FROM: alertsystem75@yahoo.com \r\n";
            $headers .="MIME-Version: 1.0" . "\r\n";
            $headers .="Content-type:text/html;charset=UTF-8" . "\r\n";

            mail($to,$subject,$message,$headers);
            header('location:citizen_thankyou.php');     
        
        }else
        {
            $mysqli->error;
        }   
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

    <title>Phone Number Registration</title>

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
                      <h4>Register Your Phone Number</h4>
                      <form method="POST" action="">
                      <div class="form-row">
                              <div class="col-lg-7">
                                  <input type="text" id="id_number" name="id_number" placeholder="National ID" class="form-control my-3 p-4" required>
                              </div>
                          </div>
                          <div class="form-row">
                              <div class="col-lg-7">
                                  <input type="text" id="names" name="names" placeholder="Full Name" class="form-control my-3 p-4" required>
                              </div>
                          </div>
                          <div class="form-row">
                              <div class="col-lg-7">
                                  <input type="text" id="phone_number" name="phone_number" placeholder="Phone Number" class="form-control my-3 p-4" required>
                              </div>
                          </div>
                          <div class="form-row">
                              <div class="col-lg-7">
                                  <input id="citizen_email" type="email" name="citizen_email" placeholder="Email Address" class="form-control my-3 p-4" required>
                              </div>
                          </div>
                          <div class="form-row">
                              <div class="col-lg-7">
                                  <input type="text" id="county" name="county" placeholder="County Residence" class="form-control my-3 p-4" required>
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
                          <div class="form-row">
                              
                          <div class="col-lg-7">
                              <button type="submit" name="submit" class="btn1 mt-3 mb-5">Register</button>
                            </div>
                          </div>
                          <p>Already have an account? <a href="citizen_login.php">Login here</a></p>
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
