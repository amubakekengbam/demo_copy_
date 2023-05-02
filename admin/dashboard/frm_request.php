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
                    <h1 class="m-0 text-blue"> Oil form</h1>
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
            <div class="card card-success card-outline">
                <div class="card-header"><i class="fas fa-oil-can"></i>OIL</div>
                <div class="card-body">
                    <form class="row g-3 needs-validation " name="add_user-form" id="add_user-form" method="POST">

                        <input type="hidden" name="action" id="action_id" value="user_addition" />

                        <div class="col-4">
                            <label for="full_name">oil type:</label>
                            <input type="text" class="form-control" name="full_name" id="full_name" required
                                autofocus />
                        </div>

                        <div class="col-4">
                            <label for="full_name">driver name</label>
                            <input type="text" class="form-control" name="driver_name" id="full_name" required
                                autofocus />
                        </div>

                        <div class="col-4">
                            <label for="full_name"> purpose</label>
                            <input type="text" class="form-control" name="purpose" id="full_name" required
                                autofocus />
                        </div>

                        <div class="col-4">
                            <label for="full_name"> quantity </label>
                            <input type="text" class="form-control" name="quantity" id="full_name" required
                                autofocus />
                        </div>
                        
                        <div class="col-4">
                            <label for="full_name"> vehicle number</label>
                            <input type="text" class="form-control" name="quantity" id="full_name" required
                                autofocus />
                        </div>
                        <button type="button" name="submit" >Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php
include(INC."/footer.php");
?>
<script>
var qry_url = "<?=  URL_FORM."/qry_add_user.php" ?>";
</script>


<script src="<?= URL_JS ?>/add_user.js"></script>
</body>

</html>