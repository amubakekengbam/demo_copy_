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
<link rel="stylesheet" href="<?=URL_ASSETS?>/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">


<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> Update Profile</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"> update profile</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->




    <!-- start of content body -->
    <div class="page-content">
        <div class="container-fluid">
            <div class="col-md-6 offset-md-3">



                <div class="card card-primary card-outline">
                    <form method="POST" action="qry_update_profile.php" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mobile</label>
                                <input type="number" class="form-control" id="mobile" name="mobile"
                                    placeholder="Enter Phone number">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1"
                                    name="exampleInputPassword1" placeholder="Password">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword2">Confirm Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword2"
                                    name="exampleInputPassword2" placeholder="CPassword">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Profile Photo</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile"
                                            name="fileupload">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" name="submit" class="btn btn-primary" onclick="fun()">Submit</button>
                        </div>
                </div>
            </div>
            </form>
        </div>

    </div>
</div>
</div>

</div>
<script>
function fun() {
    alert("Are you sure to update");
}
</script>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="<?=URL_ASSETS?>/plugins/sweetalert2/sweetalert2.min.js"></script>

<?php if(!empty($_SESSION['msg']) && isset($_SESSION['msg'])){?>
<script>
$(function() {
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
    Toast.fire({
        icon: '<?= $_SESSION['msg_status']?>',
        title: '<?= $_SESSION['msg']?>'
    })
});
</script>
<?php } unset($_SESSION['msg']); unset($_SESSION['msg_status']);?>
<script type="text/javascript">
$(document).ready(function() {
    $("#form_img").submit(function(e) {
        e.preventDefault();
        var formData = new FormData($("#form_img")[0]);

        $.ajax({
            type: "POST",
            url: "qry_update_profile.php",
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