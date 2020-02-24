<?php
 $server = "localhost";  
 $username = "root"; 
 $password= ""; 
 $database= "teacher_records";  
 $connection = mysqli_connect($server, $username, $password, $database);
  
 try{
    $connection = mysqli_connect($server, $username, $password, $database);
        // if ($connection){
        // echo "database connection successful";
        // }
    }catch(Exception $errormsg){
        echo $errormsg->getMessage();
 }
 



?>