<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/demo_copy/path.php");
include("../includes/header.php");
include('../includes/topbar.php');
include('../includes/sidebar.php');

?>
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark"> REPORT TABLE</h1>
                </div><!-- /.col -->
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"> Report Table</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="m-0 text-blue"> OIL TABLE</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 100px">Order Number</th>
                                        <th>vehicle_number </th>
                                        <th>Amount of oil</th>
                                        <th> Action</th>
                                        <th style="width: 40px">view</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                $sql =  "SELECT * 
                FROM oil as o
                LEFT JOIN oil_report as oa
                ON o.oil_id = oa.oil_table_id WHERE oa.o_user_id=".$_SESSION['auth_user']['user_id']."";

                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
    
                        echo '<tr><td>'.$row["oil_id"].'</td>';
                        echo '<td>'.$row["vehicle_number"].'</td>';                        
                        echo '<td>'.$row["amount_oil"].'</td>';
                        echo '<td>'.$row["officer_id"].'</td>';                     
                        echo '<td><a class="btn btn-success" href="'.$url.'dashboard/oil_request_view.php?id='.$row["oil_id"].'">View</a></td></tr>';
                        $dummy=$row["vehicle_number"];
                    }
                } else {
                    echo "0 results";
                }

                ?>
                                </tbody>
                            </table>
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#modal-primary">
                                Forward to
                            </button>

                            <div class="modal fade" id="modal-primary">
                                <div class="modal-dialog">
                                    <div class="modal-content bg-primary">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Send </h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="" id="oil_update_form">
                                            <div class="modal-body">

                                                <?php
$result = $conn->query("SELECT * FROM users where designation LIKE '%Joint Register%';");
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {    
        $dummy=$row["user_id"];
        $designation=$row["designation"];
    }
} else {
    echo "0 results";
}

?>
                                                <select name="officer_id" id="officer_id" class="form-control">
                                                    <option value="<?= $dummy?>"><?= $designation?></option>
                                                </select>
                                                <input type="text" name="officer_id" class="form-control"
                                                    value="<?= $dummy?>">
                                                <p></p>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-outline-light"
                                                    data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-outline-light save_change">send
                                                </button>
                                            </div>

                                    </div>
                                    </form>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-right">
                                <li class="page-item"><a class="page-link" href="#"></a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">»</a></li>
                            </ul>
                        </div>
                    </diV>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
</div>
<?php
include("../includes/footer.php");
?>
</body>
<script>
$(document).ready(function() {


    var form = $("#oil_update_form");
    if (!form.valid()) {
        //return false;
    }


    var param = form.serialize();

    console.log(param);

    $(".save_change").click(function() {

        //alert('hello');
        $.ajax({
            url: 'update_oil.php',
            method: "POST",
            data: param,
            dataType: "json",
            enctype: 'multipart/form-data',
            success: function(datalist) {
                if (datalist == true) {
                    alert('save suceessfulll');
                }

            },
            error: function(jqXHR, exception, errorThrown) {
                result = {
                    status: 0,
                    msg: JSON.parse(jqXHR.responseText)
                };
                $("#loading-div").hide();
            }
        });
    })




});
</script>


</html>