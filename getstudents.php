<?php

session_start();
if($_SESSION["id"]==""){
    header("Location:login.php");
}
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    $username = "root";
    $password = "";
     $servername ="localhost";
    
    
    $conn = mysqli_connect($servername,$username,$password);
    if(!$conn){
            die("connection failed".mysqli_connect_error());
    
    }

    
    $sql = "select * from hostel.student where id=".$id;
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    $oid = $id;
    $ofname = $row['fname'];
    $olname = $row['lname'];
    $ogender = $row['gender'];
    $oemail = $row['email'];
    $oaddress = $row['address'];
    $ocontact = $row['contact'];


    $_SESSION['oid'] = $oid;
    $_SESSION['ofname'] = $ofname;
    $_SESSION['olname'] = $olname;
    $_SESSION['ogender'] = $ogender;
    $_SESSION['oemail'] = $oemail;
    $_SESSION['oaddress'] = $oaddress;
    $_SESSION['ocontact'] = $ocontact;
    header("Location:update.php");
     

    

?>