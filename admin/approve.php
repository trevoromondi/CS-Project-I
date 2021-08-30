<?php 
    require_once('db_connect.php');
    $alertID = $_GET['alertID'];
    //$pwd = mysqli_real_escape_string($conn, md5($_POST["pwd"]));
    $sql = "SELECT alertID, alertDescription, status, officer_id FROM alert WHERE alertID='".$alertID."'";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn)); 
    if (mysqli_num_rows($result) != 1) {
        die('Record not in database');
    }
    $data = mysqli_fetch_assoc($result);
    $option=$data['status'];

?>
<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">

    <title>Approve Messsage</title>
</head>

<body>
    <section class="form my-4 mx-5">
        <div class="container">
            <div class="row g-0">
                <div class="col-lg-5">
                    <img src="../assets/red.jpg" class="img-fluid" style="height: 600px"alt="">
                </div>
                
                <div class="col-lg-7 px-5 pt-5">
                    <h1 class="font-weight-bold py-3">Emergency Alert System</h1>
                    <h4>Approve Alert Message</h4>
                    <form action="process_approve.php" method=POST enctype="multipart/form-data">
<br>
                    <div class="form-row">
                        <div class="col-lg-7">
                            <label class="form-label" style="font-weight: bold">Alert ID</label>
                            <input type="number" name="alertID" value= "<?= $data['alertID'] ?>" id="alertID" class="form-control my-3 p-4" disabled>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-lg-7">
                        <label class="form-label" style="font-weight: bold">Alert</label>
                         <textarea disabled name="alertDescription" class="form-control" rows="3"> <?= $data['alertDescription']?> </textarea>
                    </div>
                    </div>

                    <br>
                    
                    <div class="form-row">
                    <label for="Admin" style="font-weight: bold">Status</label>
                        <div class="col-lg-7">
                            <label for="Admin">Approved</label>
                            <input type="radio" name="status" value="Approved"<?php if($option=="Approved") echo 'checked="checked"'; ?>  id="Approved" class="">
                            <label for="Client">Denied</label>
                            <input type="radio" name="status" value="Denied"<?php if($option=="Denied") echo 'checked="checked"'; ?> id="Denied" class=""><br><br>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-lg-7">
                            <label for="officer_id" style="font-weight: bold">Reporting Officer ID</label>
                            <input type="text" name="officer_id" id="officer_id" value="<?= $data['officer_id']?>" class="form-control my-3 p-4" disabled>
                        </div>
                    </div>
    
            <!--<div class="form-row">
                <div class="col-lg-7">
                <input type="password" name="pwd"  id="pwd" placeholder="Enter Password" class="form-control my-3 p-4">
                </div>
            </div>-->
            

        <div class="form-row">
            <div class="col-lg-7">
            <button type="submit" id="submit" name="submit" class="btn1 mt-3 mb-5">Submit</button>
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