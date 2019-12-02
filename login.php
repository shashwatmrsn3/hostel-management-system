<?php 


if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password1 = $_POST['password'];

    $username = "root";
    $password = "";
    $servername ="localhost";


        $conn = mysqli_connect($servername,$username,$password);
        if(!$conn){
            die("connection failed".mysqli_connect_error());

        }
        
        
        $query = "SELECT id from hostel.admin where email = '$email' AND password = '$password1'";
        $result=mysqli_query($conn,$query);
        $rows = mysqli_num_rows($result); 
        if($rows==1){

            while($row = mysqli_fetch_assoc($result)){
                $stringTest = $row['id'];
          }
          session_start();
          $_SESSION["id"]=$stringTest;
          header("Location:adminpannel.php");
        }
        else {
            echo "invalid username or password";
        }
       
        

    
    
    }
            

      
?>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<div class="row">
    <div class="col-sm-3 col-md-3 col-lg-3">
    </div>
    <div class="col-sm-6 col-md-6 col-lg-6  ">
 <form class="text-center border border-light p-5" action="" method="post">

                <p class="h4 mb-4">Sign in</p>

                <!-- Email -->
                <input type="email" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="E-mail" name="email">

                <!-- Password -->
                <input type="password" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Password" name="password">

                <div class="d-flex justify-content-around">
                    <div>
                        <!-- Remember me -->
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
                            <label class="custom-control-label" for="defaultLoginFormRemember">Remember me</label>
                        </div>
                    </div>
                    <div>
                        <!-- Forgot password -->
                        <a href="">Forgot password?</a>
                    </div>
                </div>

                <!-- Sign in button -->
                <button class="btn btn-info btn-block my-4" type="submit" name="submit">Sign in</button>

                <!-- Register -->
              

            </form>
        </div>
    </div>