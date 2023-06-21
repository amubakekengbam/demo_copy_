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
                    <h1 class="m-0 text-blue"> Oil form</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Oil </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<!-- 
/php

$sql =  "SELECT  'v_number' FROM `vehicle_number`";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row

    while($row = $result->fetch_assoc()) {

       
        $sub_request=$row[""];
       

    }

    $cover_milometer=$present_milometer-$prev_milometer;

} else {
  return false;
} 
?>  -->



    <!-- start of content body -->
    <div class="page-content">
        <div class="container-fluid">
            <div class="card card-success card-outline">
                <div class="card-header"><i class="fas fa-oil-can"></i>OIL</div>
                <div class="card-body">
                    <form class="row" method="POST" action='query_frm_request.php'>
                        <div class="col-12">
                            <label for="subject"> Subject of Request </label>
                            <input type="text" class="form-control" name="sub_request" id="sub_request" required autofocus />
                        </div>
                        <div class="col-4">
                            <label for="oil_type">oil type:</label>
                            
                            <select name="oil_type" id="full_name" class="form-control">
                                <option value="" selected>Choose</option>
                                <option value="diesel"> Diesel</option>
                                <option value="Petrol"> Petrol</option>
                            </select>
                        </div>
                        
                        <div class="col-4">
                            <label for="purpose">Request of oil(l)</label>
                            <input type="text" class="form-control" name="amount_oil" id="amount_oil" required autofocus />
                        </div>

                        <div class="col-4">
                            <label >vehicle number</label>
                            <!-- <input type="text" class="form-control" name="vehicle_number" id="vehicle_number" value="" required
                                autofocus ></input> -->
                                <select for="vehicle_number" name="vehicle_number"  id="vehicle_number" class='form-control' oncChange="getVehicle(this.value);">
                                    <option value=""> </option>
                        </div>

                

                        <div class="col-4">
                            <label for="duty_on"> duty on </label>
                            <input type="text" class="form-control" name="duty_on" id="duty_on"  value="" required autofocus />
                        </div>

                        <div class="col-4">
                            <label for="consumption_rate">consumption rate</label>
                            <input type="text" class="form-control" name="consum_rate" id="consum_rate" required
                                autofocus />
                        </div>

                        

                        <div class="col-4">
                            <label for="last_issued_date">Last issue date </label>
                            <input type="date" class="form-control" name="last_issued_date" id="last_issued_date" required
                                autofocus />
                        </div>
                        <div class="col-4">
                            <label for=" last_issued">Last issued quantity </label>
                            <input type="text" class="form-control" name="last_issued" id="last_issued" required
                                autofocus />
                        </div>

                        <div class="col-4">
                            <label for="left_then">Left then</label>
                            <input type="text" class="form-control" name="left_then" id="left_then" required
                                autofocus />
                        </div>

                        <div class="col-4">
                            <label for="left_now">Left now</label>
                            <input type="text" class="form-control" name="left_now" id="left_now" required autofocus />
                        </div>

                        <div class="col-4">
                            <label for="present_milometer"> Present Milometer</label>
                            <input type="number" class="form-control" name="present_milometer" id="present_milometer"
                                required autofocus />
                        </div>
                        <div class="col-4">
                            <label for="previous_milometer"> Previous Milometer</label>
                            <input type="number" class="form-control" name="previous_milometer" id="previous_milometer"
                                required autofocus />
                        </div>

                        <div class="col-4">
                            <label for="cover_milometer"> Covered Milometer</label>
                            <input type="number" class="form-control" name="cover_milometer" id="cover_milometer"
                                required autofocus />
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