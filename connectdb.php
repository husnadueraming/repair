<?php
   
   //mysqli_connect('localhost', 'root', '', 'repair') or die ('error connect'.mysqli_connect_error());
   
   $servername ="localhost";
	$username ="root";
	$password ="";
	$dbname ="repair";

   // Create connection
   $conn = mysqli_connect($servername,$username,$password,$dbname);
   mysqli_set_charset($conn,"utf8");
  
   if(!$conn){
      die("Connection failed: ".mysqli_connect_error());
   }

?>