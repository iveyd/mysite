<?php 


   require '../config.php';

   try {
//      open connection here
   	$conn = new PDO("mysql:host=localhost;dbname=websys_shop","root","");
   } catch(PDOException $e) {
      echo 'ERROR: ' . $e->getMessage();
   }

   if ($conn) {
      echo "Connected!";
   }
 ?>