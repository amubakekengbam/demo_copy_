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
                    <h1 class="m-0 text-dark">User_role</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User_role</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <form action="upload_image.php" id="form_img" method="GET" role="form" enctype="multipart/form-data">
        <input type="text" placeholder="Name" name="name">
        <input type="file" name="img" multiple>
        <button type="submit">Submit </button>
    </form>

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