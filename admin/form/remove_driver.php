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
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">REMOVE USER</h1>
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
    <?php
    
$sql = "SELECT full_name,mobile,designation FROM users where role_id IN(4,6)";
     $driver= $conn->query($sql);


?>
    <div style="padding-left:100px; padding-right:500px">
        <form class="form-detail" action="add_driver.php" method="post">
            <div class="mb-3">
                <h1> Remove Officer</h1>

                <label for="ph_number" class="form-label"> Phone Number</label> <br><br>
                    <select class="form-control" name="ph_number" id="ph_number" required />

                    <option value="" selected>Choose</option>
                    <?php
     if($driver-> num_rows>0)  {
        while($row =$driver-> fetch_assoc()){
            echo'<option value="">'.$row['full_name'].'</option>';
        }
     ?>

                    </select>

    </div> <br>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label><br><br>
                    <select class="form-control" name="name" id="name" required />

                    <option value="" selected>Choose</option>
                    <?php
    
            echo'<option value="">'.$row['full_name'].'</option>';
        
      ?>

                    </select> <br>
    </div>

                    <div class="mb-3 ">
                        <label for="role" class="form-label">role</label><br><br>
                    <select class='form-control' name='role' id='role'required/>
                    <option value=""selected>Choose</option>
                    <?php   
      
            echo'<option> value=""> '.$row['designation'].'</option>';
        }
                    ?>
                        <div>
                            <br><br>
                            <button type="submit" class="btn btn-primary">Delete</button>

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
    $sql = "DELETE FROM 'user' where $phone='mobile' && $name='full_name' && $role='role' ";
    $result= mysqli_query($conn, $sql);
if($result)
{

    echo '<div> successfully deleted! </div>';
}

else{
    echo " not submitted";
}
    
}
  }

  ?>


<?php
include(INC."/footer.php");
?>

</body>

</html>