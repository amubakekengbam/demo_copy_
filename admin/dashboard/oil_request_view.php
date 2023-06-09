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

<!-- Modal -->
<div class="modal fade" id="#vehicleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Vehicle </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                .....
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Send</button>
            </div>
        </div>
    </div>
</div>

<?php 

$sql =  "SELECT * 
FROM oil WHERE oil_id=".$_GET['id']."";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

       
        $sub_request=$row["sub_request"];
        $oil_type = $row["oil_type"];
        $vehicle = $row["vehicle_number"];   
        $amount_oil=$row["amount_oil"];
        $duty_on=$row["duty_on"];
        $consumption_rate=$row["consumption_rate"];
        $last_issued_date=$row["last_issued_date"];
        $last_issue_quantity=$row["last_issue_quantity"];
        $left_now=$row["left_now"];
        $present_milometer=$row["present_milometer"];
        $prev_milometer=$row["prev_milometer"];
        $left_then = $row["left_then"];
    }

    $cover_milometer=$present_milometer-$prev_milometer;
    echo $cover_milometer;
} else {
    echo "0 results";
} 
?>

<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                          Oil Request
                            <a href="oil.php" class="btn btn-primary float-right">send</a>
                        </h4>
                    </div>    
                    <div class="card-body">
                        <section class="content">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="callout callout-info">
                                            <h5><i class="fas fa-info"></i> Oil:</h5>
                                           
                                        </div>


                                        <!-- Main content -->
                                        <div class="invoice p-3 mb-3">
                                            <!-- title row -->
                                            <div class="row">
                                                <div class="col-12">
                                                    <h4>
                                                        <i class="fas fa-globe"></i>High Court of Manipur,Imphal
                                                        <small class="float-right">Date: 2/10/2014</small>
                                                    </h4>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- info row -->
                                            <div class="row invoice-info">
                                                <div class="col-sm-4 invoice-col">
                                                    From
                                                    <address>
                                                        <strong><?=$duty_on?></strong><br>
                                                        High court of Manipur<br>
                                                        Mantripukhri,Imphal<br>
                                                        Email: jrghcmimphal@gmail.com
                                                    </address>
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-sm-4 invoice-col">
                                                    To
                                                    <address>
                                                        <strong> The Deputy Registrar</strong><br>
                                                        High court of Manipur<br>
                                                        Mantripukhri,Imphal<br>
                                                        Email: Rghcmimphal@gmail.com
                                                    </address>
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-sm-4 invoice-col">
                                                    <b>Subject</b><br>
                                                    <br>
                                                    <b>Request for Issue of : </b> <?= $sub_request?> <br>
                                                    <b>Liters of:</b> <?= $oil_type?>.
                                                    <!-- <b>liters</b> 2/22/2014<br>
                 // <b>Account:</b> 968-34567 -->
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.row -->
                                           <div class="column">

                                           <div class="row invoice-info">
                                                <div class="col-sm-12 invoice-col">
                                                  sir
                                                    <address>
                                                    <p> I have the honour to request you kindly to issue. <u> <?= $oil_type ?> </u>for the Vehicle/Generator of
                            this Registry bearing
                            No.MN <u> <?= $vehicle?> </u> for official duty of the Hon'ble Mr<u> <?=$duty_on?> </u>.
                            Detail of Fuel consumption and Mileometer/Odometer readings at present (along with the
                            previous one) are as shown.
                        </p>
                                                    </address>
                                                </div>

</div>
                                            <!-- Table row -->
                                            <div class="row">
                                                <div class="col-12 table-responsive">
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>Mileometer/Odometer <br>
                                                                    readings<br>
                                                                    (in Kilometers)</th>
                                                                <th>        <br>
                                                                    <br>
                                                                </th>

                                                                <th>Petrol issued <br>
                                                                    Left in the tank</th>
                                                                <th>Consumption <br>
                                                                    rate</th>
                                                                <th>date of last issue</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td><b>Present :<?=$_SESSION['auth_user']['full_name'] ?> <b></td>
                                                                <td> <?= $present_milometer?></td>
                                                                <td> <b>Last issued Qty:</b><?=$last_issue_quantity?></td>
                                                                <td> <b>rate: </b> <?=$consumption_rate?>
                                                                </td>
                                                                <td><b>date: </b> <?=$last_issued_date?></td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Previous :<b></td>
                                                                <td><?=$prev_milometer?></td>
                                                                <td><b>Left then : </b> <?=$left_then?></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Covered: <b> </td>
                                                                <td> <?= $cover_milometer?> </td>
                                                                <td><b>left now: </b> <?=$left_now?></td>
                                                                <td>
                                                                </td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.row -->

                                            <div class="row">
                                                <!-- accepted payments column -->
                                                <div class="col-6">
                                                    <!-- <p class="lead">Payment Methods:</p>
                                                    <img src="../../dist/img/credit/visa.png" alt="Visa">
                                                    <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
                                                    <img src="../../dist/img/credit/american-express.png"
                                                        alt="American Express">
                                                    <img src="../../dist/img/credit/paypal2.png" alt="Paypal"> -->

                                                    <!-- <p class="text-muted well well-sm shadow-none"
                                                        style="margin-top: 10px;">
                                                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                                        weebly ning heekya handango imeem
                                                        plugg
                                                        dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                                                    </p> -->
                                                </div>
                                                <!-- /.col -->
                                                <?php
require_once($_SERVER['DOCUMENT_ROOT']. "/demo_copy/path.php");
$output= array();
$sql =  "SELECT 
*
 FROM oil l
  INNER JOIN oil_report r
   ON l.oil_id = r.report_id";
   $result = $conn->query($sql);

?>


                                                 <div class="col-6">
                                                    <p class="lead"><b>Approve by</b></p>

                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <tbody>
                                                                <tr>
                                                                    <th style="width:50%">Joint Registrar:</th>
                                                                    <td><?php

if(['oil_status']==0){
    echo"no";
}
else{
    echo"yes";
}
?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Registrar General</th>
                                                                    <td><?php

                                                                    if(['oil_status']==0){
                                                                        echo"yes";
                                                                    }
                                                                    else{
                                                                        echo"yes";
                                                                    }
                                                                    ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Token Generated :</th>
                                                                    <td>
                                                                        <?php
if(['token_status']){
    
}



?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>STATUS:</th>
                                                                    <td>Pending/Done</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div> 
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.row -->

                                            <!-- this row will not appear when printing -->
                                            <div class="row no-print">
                                                <div class="col-12">
                                                    <a href="invoice-print.html" rel="noopener" target="_blank"
                                                        class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                                                    <button type="button" class="btn btn-success float-right"><i
                                                            class="far fa-credit-card"></i> Submit
                                                        Payment
                                                    </button>
                                                    <button type="button" class="btn btn-primary float-right"
                                                        style="margin-right: 5px;">
                                                        <i class="fas fa-download"></i> Generate PDF
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.invoice -->
                                    </div><!-- /.col -->
                                </div><!-- /.row -->
                            </div><!-- /.container-fluid -->
                        </section>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>




<?php

include("../includes/footer.php");
?>