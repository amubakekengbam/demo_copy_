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
                    <h1 class="m-0 text-black"> Profile </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add User</li>
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

                    <br>
                    <form>
                   
                        <div class="text-center">
                            <img src="<?= $url ?>assests/uploads/<?=$_SESSION['auth_user']['photo'] ?>" ;
                                style="width: 150px;">
                        </div>

                        <div class="card-body box-profile">


                            <h3 class="profile-username text-center"></h3>

                            <p class="text-muted text-center"><?=$_SESSION['auth_user']['full_name'] ?> </p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b> Phone</b> <a class="float-right"><?=$_SESSION['auth_user']['mobile'] ?></a>
                                </li>
                              
                                <li class="list-group-item">
                                    <b>Designation</b> <a class="float-right">
                                        <?=$_SESSION['auth_user']['designation'] ?></a>
                                </li>

                                <li class="list-group-item">
                                    <b>Email</b> <a class="float-right"> <?=$_SESSION['auth_user']['email'] ?></a>
                                </li>
                            </ul>

                            <a href="update_profile.php" class="btn btn-primary btn-block update_profile" id="update"
                                name="update"><b>Edit Profile</b></a>
                        </div>
                        <!-- /.card-body -->
                        
                     </form>
                </div>

            </div>
        </div>
    </div>



</div>

<?php
include(INC."/footer.php");
?>

</body>

</html>