<?php
if(isset($_POST["submit"]))
{
    //Get form data
    $officer_id=$_POST["officer_id"];
    $officer_name=$_POST["officer_name"]?? "";
    $officer_email=$_POST["officer_email"]?? "";
    $pwd=$_POST["pwd"]?? "";
    $pwd2=$_POST["pwd2"]?? "";

    //form validation

    if($pwd2 != $pwd)
    {
        echo '<script>alert("Your Passwords Do Not Match ")</script>';
        echo '<script>window.location="register.php"</script>';

    } 
    else
    {
        //Form is valid
        //Connect to DB
    
        $mysqli=NEW MySQLi('localhost','root','','cs_project');

        //Sanitize the form data-value is stripped of characters that can be used for SQL Injection
        $officer_id=$mysqli->real_escape_string($officer_id);
        $officer_name=$mysqli->real_escape_string($officer_name);
        $officer_email=$mysqli->real_escape_string($officer_email);
        $pwd=$mysqli->real_escape_string($pwd);
        $pwd2=$mysqli->real_escape_string($pwd2);

        //Generate VKey-appended timestamp with officer id and hash it
        $vkey=md5(time().$officer_id);

        //insert records into db
        $pwd=md5($pwd);
        $insert=$mysqli->query("INSERT INTO user(officer_id,officer_name,officer_email,pwd,vkey)VALUES('$officer_id','$officer_name','$officer_email','$pwd','$vkey')");


        if($insert)
        {
            //echo "Success";
            //echo '<script>alert("SUCCESS")</script>';
            //echo '<script>window.location="register.php"</script>';

            //Send email
            $to=$officer_email;
            $subject="Email Verification";
            $message="Click Here To <a href='http://localhost/CS-Project-I/CS-Project-I/verify.php?vkey=$vkey'>Verify Account</a>";
            $headers="FROM: alertsystem75@yahoo.com \r\n";
            $headers .="MIME-Version: 1.0" . "\r\n";
            $headers .="Content-type:text/html;charset=UTF-8" . "\r\n";

            mail($to,$subject,$message,$headers);
            header('location:thankyou.php');     
        
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

    <title>Registration</title>

  </head>
  <body>
      <section class="form my-4 mx-5">
          <div class="container">
              <div class="row g-0">
                  <div class="col-lg-5">
                      <img src="fire.jpg" class="img-fluid" alt="">
                  </div>
                  <div class="col-lg-7 px-5 pt-5">
                      <h1 class="font-weight-bold py-3">Emergency Alert System</h1>
                      <h4>Create your Account</h4>
                      <form method="POST" action="">
                      <div class="form-row">
                              <div class="col-lg-7">
                                  <input id="officer_id" name ="officer_id"type="text" placeholder="Officer ID" class="form-control my-3 p-4" >
                              </div>
                          </div>
                          <div class="form-row">
                              <div class="col-lg-7">
                                  <input type="text" id="officer_name" name="officer_name" placeholder="Name" class="form-control my-3 p-4" >
                              </div>
                          </div>
                          <div class="form-row">
                              <div class="col-lg-7">
                                  <input id="officer_email" type="email" name="officer_email" placeholder="Email Address" class="form-control my-3 p-4">
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
                          <p>Already have an account? <a href="login.php">Login here</a></p>
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
