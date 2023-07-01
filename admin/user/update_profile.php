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
                                <input type="password" class="form-control" id="exampleInputPassword1" name="exampleInputPassword1"
                                    placeholder="Password">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword2">Confirm Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword2" name="exampleInputPassword2"
                                    placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">photo</label>
                                <input class="form-control" type="file" name="fileupload">
                            </div>
                           
                       
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>

                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
            </div> </div>
            </form>
        </div>

    </div>
</div>
</div>

</div>


<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
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