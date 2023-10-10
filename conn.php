<?php
//include("listDBconn.php");

 
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "project-k";

  
 // Create connection
 $con = mysqli_connect($servername, $username, $password, $dbname);
  if($con)
 {
    echo "Connected successfully";
 }  
  
    
?>