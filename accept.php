<?php 
if(isset($_POST['submit'])){
    $id = $_POST['var'];
    
    
    $username = "root";
    $password = "";
    $servername ="localhost";


    $conn = mysqli_connect($servername,$username,$password);
    if(!$conn){
        die("connection failed".mysqli_connect_error());

    }

    $query = "select * from hostel.registration where id =".$id;
    $result=mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result);
    $fname = $row['fname'];
    $lname = $row['lname'];
    $email = $row['email'];
    $contact = $row['contact'];
    $address = $row['address'];
    $gender = $row['gender'];
    
   $query2 =  "INSERT INTO hostel.student( fname, lname, gender, contact, email, address) VALUES ('$fname','$lname','$gender','$contact','$email','$address')";
   if( mysqli_query($conn, $query2)){
       
            $query3 = "delete  from hostel.registration where id =".$id;
            if(mysqli_query($conn , $query3)){


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
            Your registration to this hostel has been confirmed.
            Details:
            First name: '$fname'
            Last name: '$lname'
            Contact: '$contact'
            Address: '$address'
            Gender: '$gender'";
            //send the message, check for errors
            if (!$mail->send()) {
                echo "ERROR: " . $mail->ErrorInfo;
            } else {
                header("Location:studentlist.php");
            }
        }

            //header("Location:studentslist.php");
        }
   
        
    
}

?>