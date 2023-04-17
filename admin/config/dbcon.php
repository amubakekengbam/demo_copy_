<?php
$host="localhost";
$username="root";
$password="";
$database="test";

//connection
$conn=mysqli_connect("$host","$username","$password","$database");

try{
   $db = new PDO("mysql:host=$host;dbname=$database", $username, $password);
}
catch(PDOException  $e){
   print_r($e->getMessage());
}


// check connection
 if(!$conn){
   print_r('database not connected');
    die();
 }
 else{
    //echo"database connected";

 }
