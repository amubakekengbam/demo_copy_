<?php 

 session_start();
 require_once($_SERVER['DOCUMENT_ROOT']. "/demo_copy/path.php");

if(isset($_GET['token'])){
 $token=$_GET['token'];
 $verify_query= "SELECT verify_token FROM users WHERE  verify_token='$token' LIMIT 1";
 $verify_query_run= mysqli_query($conn, $verify_query);
  if(mysqli_num_rows($verify_query_run)>0){
     $row =mysqli_fetch_array($verify_query_run);
     if($row['verify_status']=="0")
    {  $clicked_token= $row['verify_token'];
        $update_query=" UPDATE user SET verify_status='1' WHERE verify_token='$clicked_token' LIMIT 1";
        $update_query_run=mysqli_query($conn,$update_query);
    
    }

    if($update_query_run){
        $_SESSION['status']= "Your Account has been verified Successfully";
        header("Location:loginnew.php");
    }
      
  else{
     
    $_SESSION['status']="Verification Failed";
    header("Location : loginnew.php");
    exit(0);
  }
}


else{

    $_SESSION['status']="Email Already verified. Please Login";
    header("Location : loginnew.php");
    exit(0);
}
}
?>

<h3> Verify email </h3>


<?php



?>