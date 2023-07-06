<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/demo_copy/path.php");

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
                    <h1 class="m-0 text-blue">ADD VEHICLE LIST</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Vehicle List </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <?php  
    $sql = "SELECT user_id,full_name FROM users where role_id=2 or role_id=3";
    $result = $conn->query($sql);
?>
    <!-- start of content body -->
    <div class="page-content">
        <div class="container-fluid">
            <div class="card card-success card-outline">
                <div class="card-header"><i class="fas fa-oil-can"></i>Vehicle</div>
                <div class="card-body">
                    <form class="row" method="POST" action='query_frm_vehicle_list.php'>

                        <div class="col-6">
                            <label for="reg_number">Registration Number</label>

                            <input name="reg_number" id="reg_number" class="form-control" required  autofocus>
                              
                        </div>
  
                        <div class="col-6">
                            <label for="purpose">Registration  date</label>
                            <input type="date" class="form-control" name="reg_date" id="reg_date" required
                                autofocus />
                        </div>
                        <?php  
                          $sql = "SELECT user_id,full_name FROM users where role_id=4";
                               $driver= $conn->query($sql);
                            ?>

                        <div class="col-6">
                            <label for="manufacture_date">Manufacture date</label>
                            <input type="date" class="form-control" name="manufacture_date" id="manufacture_date" required  />

                        </div>
                        <div class="col-6">
                            <label for="duty_on">Engine Number</label>
                            <input type="text" class="form-control" name="eng_no" id="eng_no" value=""
                                required autofocus />
                        </div>
                        <div class="col-6">
                            <label for="chassis_no">Chassis Number </label>
                            <input type="text" class="form-control" name="chassis_no" id="chassis_no" value=""
                                required autofocus />
                        </div>
                        <div class="col-6">
                            <label for="Fuel_type">Fuel Type </label>
                            <select type="text" class="form-control" name="fuel_type" id="fuel_type" value=""
                                required autofocus />
                                <option value="" selected>Choose</option>
                                <option value="petrol">Petrol</option>
                                <option value="Diesel">Diesel</option>
</select>
                        </div>
                        <div class='col-4'>
                            <br> 
                            <input type="submit" id="submit" name="submit" value="Submit"
                                class="btn btn-sm btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php
include(INC."/footer.php");
?>
</body>

</html>      