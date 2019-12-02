<?php
    $username = "root";
    $password = "";
    $servername ="localhost";
    $conn = mysqli_connect($servername,$username,$password);
           if(!$conn){
               die("connection failed".mysqli_connect_error());
   
           }
    $id=$_GET['id'];
    $query = "delete  from hostel.student where id=".$id;
    if(mysqli_query($conn,$query)){
        header("Location:studentlist.php");
    }


?>