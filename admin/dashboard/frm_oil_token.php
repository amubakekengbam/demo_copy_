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
          <h1 class="m-0 text-dark">Token TABLE</h1>
        </div><!-- /.col -->
        <div class="col-sm-12">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active"> Token Table</li>
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
              <h3 class="m-0 text-blue"> OIL TOKEN</h3>
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
                    <th> Token</th>
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
                        $result = $conn->query("SELECT * FROM oil where id='oil_id';");
                        if ($result->num_rows > 0) {
                          // output data of each row
                          while ($row = $result->fetch_assoc()) {
                        
                            $oil_id = $row["oil_id"];
                          }
                        } else {
                          echo "0 results";
                        }

                        ?>
                        <label for="subject">Officer Name: </label>
                        <select name="officer_id" id="officer_id" class="form-control">
                          <option ><?= $oil_id?></option>
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
    $('#example2').DataTable({
      "fnCreatedRow": function(nRow, aData, iDataIndex) {
          $(nRow).attr('id', aData[0]);
        },
        'serverSide': 'true',
        'processing': 'true',
        'paging': 'true',
        'order': [],
        'ajax': {
          'url': 'fetch_token_data.php',
          'type': 'post',
        },
        "aoColumnDefs": [{
            "bSortable": false,
            "aTargets": [5]
          },

        ]
    });


  
  $(document).on('submit', '#updateUser', function (e) {
    e.preventDefault();
    //var tr = $(this).closest('tr');
    var city = $('#cityField').val();
    var username = $('#nameField').val();
    var mobile = $('#mobileField').val();
    var email = $('#emailField').val();
    var trid = $('#trid').val();
    var id = $('#id').val();
    if (city != '' && username != '' && mobile != '' && email != '') {
      $.ajax({
        url: "update_user.php",
        type: "post",
        data: {
          city: city,
          username: username,
          mobile: mobile,
          email: email,
          id: id
        },
        success: function (data) {
          var json = JSON.parse(data);
          var status = json.status;
          if (status == 'true') {
            table = $('#example').DataTable();
            // table.cell(parseInt(trid) - 1,0).data(id);
            // table.cell(parseInt(trid) - 1,1).data(username);
            // table.cell(parseInt(trid) - 1,2).data(email);
            // table.cell(parseInt(trid) - 1,3).data(mobile);
            // table.cell(parseInt(trid) - 1,4).data(city);
            var button = '<td><a href="javascript:void();" data-id="' + id + '" class="btn btn-info btn-sm editbtn">Edit</a>  <a href="#!"  data-id="' + id + '"  class="btn btn-danger btn-sm deleteBtn">Delete</a></td>';
            var row = table.row("[id='" + trid + "']");
            row.row("[id='" + trid + "']").data([id, username, email, mobile, city, button]);
            $('#exampleModal').modal('hide');
          } else {
            alert('failed');
          }
        }
      });
    } else {
      alert('Fill all the required fields');
    }
  });

  $('#example').on('click', '.editbtn ', function (event) {
    var table = $('#example').DataTable();
    var trid = $(this).closest('tr').attr('id');
    // console.log(selectedRow);
    var id = $(this).data('id');
    $('#exampleModal').modal('show');

    $.ajax({
      url: "get_single_data.php",
      data: {
        id: id
      },
      type: 'post',
      success: function (data) {
        var json = JSON.parse(data);
        $('#nameField').val(json.username);
        $('#emailField').val(json.email);
        $('#mobileField').val(json.mobile);
        $('#cityField').val(json.city);
        $('#id').val(id);
        $('#trid').val(trid);
      }
    })
  });

  $(document).on('click', '.deleteBtn', function (event) {
    var table = $('#example').DataTable();
    event.preventDefault();
    var id = $(this).data('id');
    if (confirm("Are you sure want to delete this User ? ")) {
      $.ajax({
        url: "delete_user.php",
        data: {
          id: id
        },
        type: "post",
        success: function (data) {
          var json = JSON.parse(data);
          status = json.status;
          if (status == 'success') {
            //table.fnDeleteRow( table.$('#' + id)[0] );
            //$("#example tbody").find(id).remove();
            //table.row($(this).closest("tr")) .remove();
            $("#" + id).closest('tr').remove();
          } else {
            alert('Failed');
            return;
          }
        }
      });
    } else {
      return null;
    }
  });
  });
</script>


<script>
   //fetch data in modal-body
   $("#fetch_oil_id").click(function(){
        alert(hello);
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
    });
    //end of modal-body
</script>

</html>