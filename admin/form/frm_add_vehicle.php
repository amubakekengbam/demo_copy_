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
                    <h1 class="m-0 text-blue">ADD VEHICLE</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Vehicle </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- start of content body -->
    <div class="page-content">
        <div class="container-fluid">
            <div class="card card-success card-outline">
                <div class="card-header"><i class="fas fa-oil-can"></i>Vehicle</div>
                <div class="card-body">
                    <form class="row" method="POST" action='query_frm_add_vehicle.php'>
                     
                        <div class="col-4">
                            <label for="off_inCharge">Officer inCharge</label>
                            
                            <select name="off_inCharge" id="off_inCharge" class="form-control">
                                <option value="" selected>Choose</option>
                                <option value=""> RG</option>
                                <option value="">joint RG</option>
                            </select>
                        </div>
                        
                        <div class="col-4">
                            <label for="purpose">Vehicle  number</label>
                            <input type="text" class="form-control" name="vehicle_number" id="vehicle_number" required autofocus />
                        </div>

                        <div class="col-4">
                            <label for="driver_name">Driver Name</label>
                            <input type="text" class="form-control" name="driver_name" id="driver_name" required
                                autofocus />
                        </div>
                        <div class="col-4">
                            <label for="duty_on"> date of Assignment </label>
                            <input type="date" class="form-control" name="date_assign" id="date_assign"  value="" required autofocus />
                        </div>
                        <div class="col-4">
                            <label for="servicing _date"> Next date of servicing </label>
                            <input type="date" class="form-control" name="servicing _date" id="servicing _date"  value="" required autofocus />
                        </div>
                        <div class='col-12'>
                            <br> </br>
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