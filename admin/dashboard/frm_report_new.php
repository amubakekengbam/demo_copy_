<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/demo_copy/path.php");
include("../includes/header.php");
include('../includes/topbar.php');
include('../includes/sidebar.php');
?>
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= URL_ASSETS ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= URL_ASSETS ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= URL_ASSETS ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<!-- SweetAlert2 -->
<link rel="stylesheet" href="<?= URL_ASSETS ?>/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
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
              <table class="table table-bordered" id="example2">
                <thead>
                  <tr>
                    <th style="width: 100px">Order Number</th>
                    <th>vehicle_number </th>
                    <th>Amount of oil</th>
                    <th>Status</th>
                    
                   
                <?php if($role_id == 5){  // ?>
                  <th>Generate Token</th>
                  <?php } 
                  else{
                    echo '<th>Forward To</th>';
                            }
                  ?>


                    <th> Action</th>
                    <th style="width: 40px">view</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>

              <?php
              $sql = "SELECT * 
                FROM oil as o
                LEFT JOIN oil_report as oa
                ON o.oil_id = oa.oil_table_id WHERE oa.o_user_id=" . $_SESSION['auth_user']['user_id'] . "";
              ?>

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
                          while ($row = $result->fetch_assoc()) {
                            $dummy = $row["user_id"];
                            $designation = $row["designation"];
                          }
                        } else {
                          echo "0 results";
                        }

                        ?>
                        <label for="subject">Officer Name: </label>
                        <select name="officer_id" id="officer_id" class="form-control">
                          <option value="<?= $dummy ?>"><?= $designation ?></option>
                        </select>
                        <label for="subject">Oil Id:</label>
                        <input type="text" name="oil_id" class="form-control officer_oil_id" value="">
                        <p></p>
                      </div>
                      <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-outline-light save_change">send
                        </button>
                      </div>

                  </div>
                  </form>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>

              //model-primary end 



              // begin model for token 
              <div class="modal fade" id="modal-token">
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
                        $result = $conn->query("SELECT * FROM users where phone='mobile';");
                        if ($result->num_rows > 0) {
                          // output data of each row
                          while ($row = $result->fetch_assoc()) {
                            $dummy = $row["user_id"];
                            $designation = $row["designation"];
                          }
                        } else {
                          echo "0 results";
                        }

                        ?>
                        <label for="subject">Phone Number: </label>
                        <select name="officer_id" id="officer_id" class="form-control">
                          <option value="<?= $dummy ?>"><?= $designation ?></option>
                        </select>
                        <label for="subject">Oil Id:</label>
                        <input type="text" name="oil_id" class="form-control officer_oil_id" value="">
                        <p></p>
                      </div>
                      <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
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
<script src="<?= URL_ASSETS ?>/plugins/sweetalert2/sweetalert2.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="<?= URL_ASSETS ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= URL_ASSETS ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= URL_ASSETS ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= URL_ASSETS ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= URL_ASSETS ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= URL_ASSETS ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= URL_ASSETS ?>/plugins/jszip/jszip.min.js"></script>
<script src="<?= URL_ASSETS ?>/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= URL_ASSETS ?>/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= URL_ASSETS ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= URL_ASSETS ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= URL_ASSETS ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
  $(document).ready(function () {
    var Toast = Swal.mixin({
      
    });

    //initializing datatables with ajax call 
    var oiltable = $('#example2').DataTable({
      "ordering": false,
      "paging": true,
      "info": false,
      "searching": true,
      "autoWidth": false,
      "language": {
        searchPlaceholder: "By All Data"
      },
      "processing": true,
      "serverSide": false,
      "order": [],
      "ajax": {
        url: "fetch_data.php",
        type: "POST"
      },
      "columnDefs": [{
          "orderable": false,
        }
        // {
        //   'visible':false,
        //   'targets':[0]
        // }
      ]      
    });

      //fetch data in modal-body
      $(document).on('click','.fetch_oil_id',function(){
    var my_id_value = $(this).data('id');
        $(".officer_oil_id").val(my_id_value);
   });

   $(document).on('click','.save_change',function(){
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
          
        }); //end of modal-body
    });


     //update  approve status 
     $(document).on('click','.approve_request',function(){
      var id = $(this).val();

      console.log(id);
      // $('#exampleModal').modal('show');

      $.ajax({
        url: "query_fetch_token_data.php",
        data: {
          id:id
        },
        type: 'post',
        dataType: "JSON",
        success: function(data) {              
            if(data['flag'] ==1){
              alert(data['data']);
              oiltable.ajax.reload();
            }else{
              alert(data['data']);
            }
        }
      })
    });
//


//update reject update
$(document).on('click','.reject_request',function(){
          //console.log('hello');
      var table = $(this).data('report_id');
      var trid = $(this).closest('tr').attr('report_id');
      // console.log(selectedRow);
      var id = $(this).val('report_id');

      console.log("reject");
});


//end of reject update
  
});


</script>


</html>