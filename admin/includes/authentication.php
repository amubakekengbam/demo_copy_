
<?php 

session_start();
  if(!isset($_SESSION['auth'])){
$_SESSION['auth_status']="login to access dashboard";
header("Location: loginnew.php");
 exit(0);
  }
  else{
if( $_SESSION['auth']=="1"){
  header("Location: ../index.php");
   exit(0);
}  else{
  header("Location: ../index.php");
   exit(0);
      }

   }
?>