<?php

$fnameErr="";$lnameErr="";$addressErr="";$emailErr="";$textErr="";$contactErr="";$reason="";
$valid = true;

if(isset($_POST['submit'])){
	$lname = $_POST['lname'];
	$fname = $_POST['fname'];
	$address = $_POST['address'];
	$contact = $_POST['contact'];
	$email = $_POST['email'];
	$radio = $_POST['radio'];
	$reason = $_POST['reason'];
	
	if($fname==""){
		$fnameErr = "Enter first name";
		$valid=false;
	}
	if($lname==""){
		$lnameErr="Enter last name";
		$valid=false;
	}
	if($address==""){
		$addressErr="Enter your address";
		$valid=false;
	}
	$username = "root";
	$password = "";
	$servername ="localhost";


	$conn1 = mysqli_connect($servername,$username,$password);
	if(!$conn1){
			die("connection failed".mysqli_connect_error());

	}
		//echo "connection established";

	$sql1 = "select * from hostel.registration where email = '$email'";
	$result1 = mysqli_query($conn1,$sql1);

	if($email==null){
		// if(mysqli_num_rows($result1) > 0){
		// $emailErr = "This email is already registred. Please choose a different email";
		// $valid=false;
		$emailErr="Enter an email address";
	}
		
	// if($email=="" or !preg_match("/.edu./i", $email)){
	// 	$emailErr="Enter your valid college email address";
	// 	$valid=false;
	// }
	
	if(strlen($reason)<5){
		$textErr="Please state your reason within 200 characters";
		$valid=false;
	}
	if($contact==""){
		$contactErr="Please enter your contact  number";
		$valid=false;
	}
	if($valid){
		$username = "root";
		$password = "";
		$servername ="localhost";


		$conn = mysqli_connect($servername,$username,$password);
		if(!$conn){
			die("connection failed".mysqli_connect_error());

		}
		//echo "connection established";
		$str=rand(); 
		$token = md5($str); 
		$sql = "INSERT INTO hostel.registration( fname, lname, gender, contact, email, address, reason,token) VALUES ('$fname','$lname','$radio','$contact','$email','$address','$reason','$token')";
		
		if(mysqli_query($conn,$sql)){
			echo "<script>alert('registration successfull')</script>";
			require 'PHPMailer-master\src\Exception.php';
            require 'PHPMailer-master\src\PHPMailer.php';
            require 'PHPMailer-master\src\SMTP.php';
            $mail = new  PHPMailer\PHPMailer\PHPMailer();
            $mail->isSMTP();
            $mail->SMTPSecure = 'ssl';
            $mail->SMTPAuth = true;
            $mail->SMTPDebug = 2;
            $mail->Host = 'ssl://smtp.gmail.com:465';
            $mail->Port = 465;
            $mail->Username = 'deuralihostel@gmail.com';
            $mail->Password = 'deurali123';
            $mail->setFrom('deuralihostel@gmail.com');
            $mail->addAddress($email);
            $mail->Subject = 'Hello from PHPMailer!';
            $mail->Body = "Dear Student,
            Your registration to this hostel has been done.
            Details:
            First name: '$fname'
            Last name: '$lname'
            Contact: '$contact'
            Address: '$address'
			Gender: '$radio';
			Reason: '$reason'
			To update these information in case of any erros, Please click on the link below:
				http://localhost/hostel/updateregistration.php?id=".$token;
			//send the message, check for errors
			

            if (!$mail->send()) {
				echo "ERROR: " . $mail->ErrorInfo;
				session_start();
			$_SESSION['check']=1;
			header("Location: homee.php?id=1");
            } else {
                header("Location:homee.php");
            }
		}
		else
		{
			echo "Error in sql query";
		}


	}
    exit();
}

?>
<!DOCTYPE html>

<html>
<head>
	<title>Forms</title>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>








<style>
	.error{
		color:red;
	}
</style>


</head>
<body>
	<div class="row">
	<div class="col-md-2 col-lg-2 col-sm-2">
	</div>
	<div class="col-md-8 col-lg-8 col-sm-8  ">
		<div class="card">
 			<div class="card-header text-white bg-dark " style="text-align: center;">
    			Hostel registration
  			</div>
  		<div class="card-body">
  			<form method="post" name="myforms" enctype = "multipart/form-data"  action="<?php 
         echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  				<label>Name</label>
  				<div class="form-group">
  					 <div class="row">
    <div class="col">
      <input type="text" name="fname"  class="form-control" placeholder="First name"><span  class="error"><?php echo $fnameErr;?></span>
    </div>
    <div class="col">
      <input type="text" class="form-control" name="lname" placeholder="Last name"><span  class="error"><?php echo $lnameErr;?></span>
    </div>
  </div>
  				</div>

  				 <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" name="address" class="form-control"  placeholder="Enter Address"><span  class="error"><?php echo $addressErr;?></span>
  </div>

  <fieldset class="form-group">
  	<div class="row">
  		<div class="col">
			    <div class="row">
			      <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
			      <div class="col-sm-10">
			        <div class="form-check">
			          <input class="form-check-input" type="radio" name="radio" id="gridRadios1" value="Male" checked>
			          <label class="form-check-label" for="gridRadios1">
			            Male
			          </label>
			        </div>
			        <div class="form-check">
			          <input class="form-check-input" type="radio" name="radio" id="gridRadios2" value="Female">
			          <label class="form-check-label" for="gridRadios2">
			           Female
			          </label>
			        </div>
        
      			</div>
    </div>
</div>

</div>
  </fieldset>
  <div class="form-group">
  	<div class="form-group">
    <label for="inputAddress">Contact-No.</label>
    <input type="text" class="form-control" name="contact"  placeholder="Enter Contact number"><span  class="error"><?php echo $contactErr;?></span>
  </div>
  </div>



				  <div class="form-group">
				    <label for="exampleInputEmail1">Email address</label>
				    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" ><span  class="error"><?php echo $emailErr;?></span>
				    
				  </div>
		<div class="form-group">
	      <label for="company-content">Why Do you want to Join this hostel ? (In 200 characters)</label>
	      <textarea  placeholder="Enter description"
	       name="reason"
	      id="company-content"  spellcheck="false"
	      class="form-control autosize-target text-left"
	      style="resize: vertical;"
	      rows="5">
	             
	      </textarea><span  class="error"><?php echo $textErr;?></span>
	      
    </div>
	
				  
				  <button type="submit" name="submit" class="btn btn-dark">Submit</button>
</form>
   
  		</div>
	</div>

	</div>
	</div>
</body>
</html>