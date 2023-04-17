
<?php
include("../includes/header.php");
include('../includes/topbar.php');
include('../includes/sidebar.php');

require_once $_SERVER['DOCUMENT_ROOT'].'/demo_new/admin/config/dbcon.php';

?>


<div class="content-wrapper">

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Vechicle User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Vehicle_User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->   


 <!-- /.card -->
 <div class="container">
  <div class="row">
    <div class="col-mid-12">

 <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable of Vehichle</h3>
<br></br>
                <a href="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="AddUserModal">Add User</a>
</div>

              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>id </th>
                    <th>Name</th>
                    <th>email</th>
                    <th>of_design</th>
                    <th>of_driver</th>
                    <th>of_phone</th>
                    <th>of_address</th>
                    <th>of_creation</th>


                  
                  </tr>
                  </thead>
               

                <?php 
                $sql = "SELECT * FROM officer";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
    
                        echo '<tr><td>'.$row["officer_id"].'</td>';
                        echo '<td>'.$row["officer_name"].'</td>';
                        echo '<td>'.$row["officer_email"].'</td>';
                        echo '<td>'.$row["officer_designation"].'</td>';
                        echo '<td>'.$row["offficer_driver"].'</td>';
                        echo '<td>'.$row["officer_phone_no"].'</td>';
                        echo '<td>'.$row["officer_address"].'</td>';
                        echo '<td>'.$row["officer_creation"].'</td></tr>';
                    }
                } else {
                    echo "0 results";
                }

                ?>
              
</table>
        </div>
      </div>
    </div>
   </div>

</div>

</div>
<?php
include("../includes/footer.php");
?>

<!-- DataTables  & Plugins -->
<script src="<?=$url?>assests/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=$url?>assests/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=$url?>assests/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=$url?>assests/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?=$url?>assests/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?=$url?>assests/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?=$url?>assests/plugins/jszip/jszip.min.js"></script>
<script src="<?=$url?>assests/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?=$url?>assests/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?=$url?>assests/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?=$url?>assests/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?=$url?>assests/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
  // $(function () {
    
  // });
  $(document).ready(function(){
    $('#example2').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": false,
      "responsive": true,
    });
  })
</script>
</body>
</html>