<?php 
session_start();
if($_SESSION["id"]==""){
    header("Location:login.php");
}
if($_POST['submit']){
    $id = $_POST['var'];
    
    $username = "root";
    $password = "";
    $servername ="localhost";


    $conn = mysqli_connect($servername,$username,$password);
    if(!$conn){
        die("connection failed".mysqli_connect_error());

    }

    $query = "delete from hostel.registration where id='$id'";
    if(mysqli_query($conn,$query)){
        header("Location:studentlist.php");
    }
}

?>