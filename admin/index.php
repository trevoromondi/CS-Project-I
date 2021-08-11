<?php




include('includes/header.php'); 
include('includes/navbar.php'); 


?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Admin Panel</h1>
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Registered Users</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

              <?php
                require('db_connect.php');

                $officer_id = $_POST['officer_id'] ?? "";
                $query="SELECT officer_id FROM user ORDER BY officer_id";
                $query_run=mysqli_query($conn,$query);

                $row=mysqli_num_rows($query_run);
                echo '<h4>'.$row.'</h4>';
                ?>

              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Alerts Sent Out</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
              <?php
              

               // require('db_connect.php');

                //$officer_id = $_POST['officer_id'] ?? "";
                //$query="SELECT * FROM messages ORDER BY officer_id";
                //$query_run=mysqli_query($conn,$query);

                //$row=mysqli_num_rows($query_run);
                //echo '<h4>'.$row.'</h4>';
                ?>
            </div>
            <div class="col-auto">
              <i class="fas fa-comments fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Fire Alerts Sent Out</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
              <?php
              

                require('db_connect.php');

                //$officer_id = $_POST['officer_id'] ?? "";
                $query="SELECT * FROM fire_alerts";
                $query_run=mysqli_query($conn,$query);

                $row=mysqli_num_rows($query_run);
                echo '<h4>'.$row.'</h4>';
                ?>
            </div>
            <div class="col-auto">
              <i class="fas fa-comments fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    
    <!-- Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Missing Persons Alerts Sent Out</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
              <?php
              

                require('db_connect.php');

                //$officer_id = $_POST['officer_id'] ?? "";
                $query="SELECT * FROM missing_persons";
                $query_run=mysqli_query($conn,$query);

                $row=mysqli_num_rows($query_run);
                echo '<h4>'.$row.'</h4>';
                ?>
            </div>
            <div class="col-auto">
              <i class="fas fa-comments fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Card -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Terrorism Alerts Sent Out</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"></div>

            </div>
            <div class="col-auto">
              <i class="fas fa-comments fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Content Row -->


  <?php
include('includes/scripts.php');
include('includes/footer.php');
?>