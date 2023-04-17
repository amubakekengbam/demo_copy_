<?php
session_start();
include("../config/dbcon.php");
include('../includes/topbar.php');
require_once("../../path.php");
include_once(INC.'/header.php');
include_once(INC.'/sidebar.php');

?>
<div class="content-wrapper" >

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">User_role</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User_role</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div style="padding-left:100px; padding-right:500px" >
        <form class="form-detail" action="add_driver.php" method="post">
            <div class="mb-3">
                <h1> ADD OFFICER</h1>

                <label for="ph_number" class="form-label"> Phone Number</label> <br><br>

                <input type="text" name="ph_number" class="form-control" id="ph_number">
                <!-- <div id="number" class="form-text">We'll never share your detail with anyone else.</div> -->

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label><br><br>
                    <input type="text" name="name" class="form-control" id="name">

                    <div class="mb-3 ">
                        <label for="role" class="form-label">role</label><br><br>
                        <input type="text" name="role" class="form-control" id="role">
                        <div>
                            <br><br>
                            <button type="submit" class="btn btn-primary">Submit</button>

                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
</div>

<?php  
  if($_SERVER['REQUEST_METHOD']== 'POST'){
$phone=$_POST["ph_number"];
$name=$_POST['name'];
$role=$_POST["role"];
echo $phone.$name.$role;

if(empty($phone)||empty($name)||empty($role)){
    echo "phone cannot be empty";
    echo " not submitted";
    echo " not submitted";

}else{
    $sql = "INSERT INTO `phone` (`phone_number`, `Role`, `name`) VALUES ('$phone', '$name', '$role')";
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