<?php
    session_start();
    if($_SESSION["id"]==""){
        header("Location:login.php");
    }
    else{

        $username = "root";
        $password = "";
        $servername ="localhost";


        $conn = mysqli_connect($servername,$username,$password);
        if(!$conn){
            die("connection failed".mysqli_connect_error());

        }
        $sql = "SELECT * FROM hostel.registration";
        if($result = mysqli_query($conn, $sql)){
          echo "hi";
          echo "<h2 style='margin-left:300px;'> Registration List</h2>";
        if(mysqli_num_rows($result) > 0){
            echo "test";
          echo "<table   class='table'>";
        echo "<thead>";
            echo "<tr>";
                echo "<th>id</th>";
                echo "<th>i</th>";
                echo "<th>id</th>";
                echo "<th>id</th>";
                echo "<th>id</th>";

                echo "<th>first_name</th>";
                echo "<th>last_name</th>";
                echo "<th>gender</th>";
                echo "<th>address</th>";
                echo "<th>details</th>";
            echo "</tr>";
            echo "</thead>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<th>i</th>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['id'] . "</td>";

                echo "<td>" . $row['fname'] . "</td>";
                echo "<td>" . $row['lname'] . "</td>";
                echo "<td>" . $row['gender'] . "</td>";
                echo "<td>" . $row['address'] . "</td>";
                echo "<td><a href = 'regdetails.php?id=".$row['id']."'>Details</a></td>";
                echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "<p style='margin-left:300px;'> No records matching your query were found.</p>";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
        
    }

?>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
  Hostel  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a  class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="../assets/img/logo-small.png">
          </div>
        </a>
        <a  class="simple-text logo-normal">
          Deurali Hostel
          
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
        <li >
            <a href="adminpannel.php">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a href="studentlist.php">
              <i class="nc-icon nc-single-02"></i>
              <p>Students</p>
            </a>
          </li>
          <li>
            <a href="registrationlist.php">
              <i class="nc-icon nc-single-copy-04"></i>
              <p>Registration</p>
            </a>
          </li>
          <li>
            <a href="destroysession.php">
              <i class="nc-icon nc-button-power"></i>
              <p>Logout</p>
            </a>
          </li>
          
          
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            
              <div class="input-group no-border">
                <!-- <input type="text" value="" class="form-control" placeholder="Search..."> -->
                <div class="input-group-append">
                  <div class="input-group-text">
                    <!-- <i class="nc-icon nc-zoom-split"></i> -->
                  </div>
                </div>
              </div>
              
                    <!-- <thead class=" text-primary">
                      <th>
                        First Name
                      </th>
                      <th>
                        Last Name
                      </th>
                      <th>
                        Gender
                      </th>
                      <th >
                        Address
                      </th>
                      <th >
                        Details
                      </th>
                      <th >
                        Update
                      </th>
                    </thead> -->
                   
            <!-- <ul class="navbar-nav">
              <li class="nav-item">
                 <a class="nav-link btn-magnify" href="#pablo"> -->
                  <!-- <i class="nc-icon nc-layout-11"></i> -->
                  <!-- <p>
                     <span class="d-lg-none d-md-block">Stats</span> -->
                  
                
         
      <!-- <div class="panel-header panel-header-lg">

  <canvas id="bigDashboardChart"></canvas>


 </div> --> 
      
  <!--   Core JS Files   -->
  <!-- <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
  <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initChartsPages();
    });
  </script> -->
</body>

</html>
