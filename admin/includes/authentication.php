<?php 
require_once($_SERVER['DOCUMENT_ROOT']. "/demo_copy/path.php");

  if(!isset($_SESSION['auth_user'])){
    $_SESSION['login_error']="Not authorized.";
    header("Location: loginnew.php");
  exit(0);
  }

  switch($_SESSION['auth_user']['role_id']){
   
    case 1:  //admin
      header("Location: ../index.php"); //go to admin page
    break;
    case 2 : //officer
      header("Location: ../index.php"); //go to officer page
    break;
    case 3 : //driver
      header("Location: ../index.php"); //go to driver page
    break;
    default :
      session_destroy();
      session_start();
      $_SESSION['login_error']="Not authorized.";
      header("Location: loginnew.php");
  }
