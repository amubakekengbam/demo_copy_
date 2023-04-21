<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/demo_copy/path.php");
require_once(FORM. "/qry_add_user.php");


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
                    <h1 class="m-0 text-dark">Profile</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">profile</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->




    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Profile Update</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <!-- <form method="post" action="qry_update_profile">
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <input type="text" class="form-control" name="address" id="exampleInputEmail1" placeholder="Address">
                </div>
                <!-- <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div> -->
        <!-- <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input"  name="photo" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                    </div>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
            </div>
            <!-- /.card-body -->

        <!-- <div class="card-footer">
                <button type="submit" class="btn btn-primary"  onClick="submitFrom();">Submit</button>
            </div>
        </form> -->



        <!-- </div> -->


        <form action="qry_update_profile.php" id="form_img" method="post" role="form" enctype="multipart/form-data">

            <div class="form-check">
                <input type="text" placeholder="address" name="address">
                <input type="file" name="photo" multiple>
                <button type="submit" class="btn btn-primary">Submit </button>

            </div>
        </form>


    </div>

</div>


<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $("#form_img").submit(function(e) {
        e.preventDefault();
        var formData = new FormData($("#form_img")[0]);

        $.ajax({
            url: $("#form_img").attr('action'),
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(resp) {
                console.log(resp);
            }
        });
    });
});
</script>

<?php
include(INC."/footer.php");
?>

</body>

</html>

<?php
include(INC."/footer.php");
?>