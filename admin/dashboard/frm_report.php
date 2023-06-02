<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/demo_copy/path.php");
include("../includes/header.php");
include('../includes/topbar.php');
include('../includes/sidebar.php');



?>
<!-- SweetAlert2 -->
<link rel="stylesheet" href="<?=URL_ASSETS?>/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
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
                                        <th>Status</th>
                                        <th>Forward To</th>
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
                        echo'<td>
                        <?php
                        if ($row ["status"]==1){
                            echo"Pending";
                        }if($row["status"]==2){
                            echo"Accept":

                        }if($row["status"]==3){
                            echo"Reject";
                        }
                        
                        ?></td>';     
                        echo '<td>   <select onchange="status_update(this.options[this.selectedIndex].value)">
                      
                        <option value="1"> Pending </option>
                         <option value="2"> Accept</option>
                         <option value="3"> Reject </option>


                        </select>
                        <a type="button" class="btn btn-primary fetch_oil_id" data-toggle="modal"
                        href="#modal-primary" data-id="'.$row["oil_id"].'">
                        Update
                    </a>  <button type="button" class="btn btn-success swalDefaultSuccess">
                    Launch Success Toast
                  </button> </td>';   
                  echo '<td><a class="btn btn-success" href="'.$url.'dashboard/oil_request_view.php?id='.$row["oil_id"].'">View</a></td>';
                  echo '<td><a class="btn btn-success" href="'.$url.'dashboard/oil_request_view.php?id='.$row["oil_id"].'">View</a></td>
                  </tr>';
                  $dummy=$row["vehicle_number"];
             
                    }
                } else {
                    echo "0 results";
                }

                ?>
                                </tbody>
                            </table>
                           

                            <div class="modal fade" id="modal-primary">
                                <div class="modal-dialog">
                                    <div class="modal-content bg-primary">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Send </h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form method="POST" id="oil_update_form">
                                            <div class="modal-body">

                                                <?php
$result = $conn->query("SELECT * FROM users where designation LIKE '%Register General%';");
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
                                                <label for="subject">Officer Name: </label>
                                                <select name="officer_id" id="officer_id" class="form-control">
                                                    <option value="<?= $dummy?>"><?= $designation?></option>
                                                </select>
                                                <label for="subject">Oil Id:</label>
                                                <input type="text" name="oil_id" class="form-control officer_oil_id"
                                                    value="">
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

<!-- SweetAlert2 -->
<script src="<?=URL_ASSETS?>/plugins/sweetalert2/sweetalert2.min.js"></script>
<script>
$(document).ready(function() {

    var Toast = Swal.mixin({
      
    });
function status_update(value){
    alert(value);

}

    $(".fetch_oil_id").click(function(){
        var my_id_value = $(this).data('id');
        $(".officer_oil_id").val(my_id_value);
    })
   

    $(".save_change").click(function() {
        var officer_oil_id = $(".officer_oil_id").val();
      //  alert(officer_oil_id);
        var form = $("#oil_update_form");
    if (!form.valid()) {
        //return false;
    }
        var param = form.serialize();
       console.log(param);
        $.ajax({
            url: 'update_oil.php',
            method: "POST",
            data: param,
            enctype: 'multipart/form-data',
            success: function(datalist) {
                datalist = datalist.replace(/^\s+|\s+$/g, '');
                console.log(datalist);
                Toast.fire({
        icon: 'success',
        title: datalist
      })
            }
          
        });
    })




});
</script>


</html>