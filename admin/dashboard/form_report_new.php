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
                            <table class="table table-bordered" id="dataTable">
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
  <!-- Optional JavaScript; choose one of the two! -->
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="js/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
  <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/dt-1.10.25datatables.min.js"></script>
  <!-- Option 2: Separate Popper and Bootstrap JS -->
  
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

<script tye='text/javascript'>
$('#dataTable').DataTable({

    'serverSide': true,
    'processing': true,
    'paging': tur,
    'oder':[];
    'ajax':{
        'url':'fetch_data.php',
        'type':'post;
    
    },
    'success': function(nRow, aData,iDAtaIndex){
        $(nRow).attr('id',aData[0]);
    }
    'reject':[{
        'target':[0],
        'orderable':false,
    }]
})
$(document).ready(function() {

    var Toast = Swal.mixin({
      
    });
function status_update(value){
    alert(value);

}

    }
          
</script>


</html>