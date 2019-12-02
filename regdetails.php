<?php
session_start();
if($_SESSION["id"]==""){
    header("Location:login.php");
}
 $username = "root";
 $password = "";
 $servername ="localhost";
 $conn = mysqli_connect($servername,$username,$password);
        if(!$conn){
            die("connection failed".mysqli_connect_error());

        }
        $query = "SELECT * from hostel.registration where id=".$_GET['id'];
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
        

?>

<style>
    .table{
        padding-left:250px;
        
    }
</style>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
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
            <a href="#">
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
      <h3>                                           Registration <br>Details</h3>

              
              </nav>
              <div style="padding-left:250px; margin-top:0px;">

    <table class="table">
        <th>
        <thead>
            <tr >
               <td scope = "col" ><b> Attributes</b></td>
                <td scope = "col"><b>Details</b></td>
            </tr>
        </thead></th>
        
        <tr>
            <td>First Name</td>
            <td><?php echo $row['fname'];?></td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td><?php echo $row['lname'];?></td>
        </tr>
        <tr>
            <td>Address Name</td>
            <td><?php echo $row['address'];?></td>
        </tr>
        <tr>
            <td>Gender</td>
            <td><?php echo $row['gender'];?></td>
        </tr>
        <tr>
            <td> Email</td>
            <td><?php echo $row['email'];?></td>
        </tr>
        <tr>
            <td>Contact number</td>
            <td><?php echo $row['contact'];?></td>
        </tr>
        <tr>
            <td>Reason</td>
            <td><?php echo $row['reason'];?></td>
        </tr>
        
    </table>
    <form action="accept.php" method="post">
<input type='hidden' name='var' value="<?php echo $row['id'];?>"/> 

<input type="submit" value="Accept"name="submit" class="btn btn-outline-primary" style="background-color:rgb(3, 194, 252)"/>
</form>
<form action="reject.php" method="post">
<input type='hidden' name='var' value="<?php echo $row['id'];?>"/> 

<input type="submit" value="Reject" name="submit"  class="btn btn-danger" /> 
</form>
    </div>
      <!-- <div class="panel-header panel-header-lg">

  <canvas id="bigDashboardChart"></canvas>-->


 </div> 
      
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



    
            <!-- <div id="sidebar" class="well sidebar-nav">
                <h5><i class="glyphicon glyphicon-home"></i>
                    <small><b>PROFILE</b></small>
                </h5>
                <ul class="nav nav-pills nav-stacked">
                    <li ><a href="#">Home</a></li>
                    <li><a href="#">View profile</a></li>
                    
                </ul>
                <h5><i class="glyphicon glyphicon-user"></i>
                    <small><b>MANAGE</b></small>
                </h5>
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="list.php">REGISTRATION</a></li>
                    <li><a href="#">STUDENTS</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-8">
        </div>
    </div>
    <div style="padding-left:250px; margin-top:0px;">
    <table class="table">
        <th>
        <thead>
            <tr >
               <td scope = "col" ><b> Attributes</b></td>
                <td scope = "col"><b>Details</b></td>
            </tr>
        </thead></th>
        
        <tr>
            <td>First Name</td>
            <td><?php echo $row['fname'];?></td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td><?php echo $row['lname'];?></td>
        </tr>
        <tr>
            <td>Address Name</td>
            <td><?php echo $row['address'];?></td>
        </tr>
        <tr>
            <td>Gender</td>
            <td><?php echo $row['gender'];?></td>
        </tr>
        <tr>
            <td> Email</td>
            <td><?php echo $row['email'];?></td>
        </tr>
        <tr>
            <td>Contact number</td>
            <td><?php echo $row['contact'];?></td>
        </tr>
        <tr>
            <td>Reason</td>
            <td><?php echo $row['reason'];?></td>
        </tr>
    </table>
    <div style="display:inline-block;">
<form action="accept.php" method="post">
<input type='hidden' name='var' value="<?php echo $row['id'];?>"/> 

<input type="submit" value="Accept"name="submit" class="btn btn-outline-primary" style="background-color:rgb(3, 194, 252)"/>
</form>
<form action="reject.php" method="post">
<input type='hidden' name='var' value="<?php echo $row['id'];?>"/> 

<input type="submit" value="Reject" name="submit"  class="btn btn-danger" /> 
</form>
</div>
</div>

 -->
