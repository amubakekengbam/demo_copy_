<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/demo_copy/path.php");
require_once(FORM. "/qry_add_user.php");


if(empty($_SESSION['auth_user']['user_id'])){
    header('location:includes/loginnew.php');
}

$role_id = $_SESSION['auth_user']['role_id'];

include("../includes/header.php");
include('../includes/topbar.php');
include('../includes/sidebar.php');

?>


<?php  
  if($_SERVER['REQUEST_METHOD']== 'POST'){
$address=$_POST['address'];
$photo=$_POST[''];
$role=$_POST["role"];
echo $phone.$name.$role;

if(empty($Address)||empty($photo)){
    echo "phone cannot be empty";
    echo " not submitted";
    echo " not submitted";

}else{
    $sql = "INSERT INTO `user` (`address`, `photo`) VALUES ('$address', '$photo')";
    $result= mysqli_query($conn, $sql);
if($result)
{

    echo '<div> success! </div>';
}

else{
    echo " not submitted";
}
    
}
  }

  ?>