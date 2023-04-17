<?php
require_once("../../path.php");
require_once(FORM."/qry_add_user.php");



include_once(INC.'/header.php');
include_once(INC.'/topbar.php');
include_once(INC.'/sidebar.php');
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





    <!-- start of content body -->
    <div class="page-content">
        <div class="container-fluid">
            <div class="col-md-6 offset-md-3">

                <form class="row g-3 needs-validation " name="add_user-form" id="add_user-form" method="POST">

                    <input type="hidden" name="action" id="action_id" value="user_addition" />

                    <div class="col-12">
                        <label for="full_name">Full Name:</label>
                        <input type="text" class="form-control" name="full_name" id="full_name" required autofocus />
                    </div>
                    <div class="col-12">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email" id="email" required />
                    </div>
                    <div class="col-12">
                        <label for="mobile">Mobile:</label>
                        <input type="text" class="form-control" name="mobile" id="mobile" min-length="10"
                            max-length="10" required />
                    </div>
                    <div class="col-12">
                        <label for="gender">Gender:</label> <br />
                        <input type="radio" name="gender" value="male" checked required />&nbsp; Male
                        <input type="radio" name="gender" value="female" required />&nbsp; Female
                        <input type="radio" name="gender" value="transgender" required />&nbsp; Transgender
                    </div>
                    <div class="col-12">
                        <label for="designation">Designation:</label>
                        <input type="text" class="form-control" name="designation" id="designation" required />
                    </div>
                    <div class="col-12">
                        <label for="role_id">Select User Role:</label>
                        <select class="form-control" name="role_id" id="role_id" required>
                            <option value="" selected>Choose....</option>
                            <?php
                                $roles = Add_user::get_role(); //calling static Class method
                                foreach($roles as $row){ 
                                    echo "<option value='{$row['role_id']}'  >{$row['role_name']}</option>";
                                }

                            ?>
                        </select>
                    </div>


                    <div class="col-md-12">
                        <br />
                        <button type="button" id="purchase-btn-save" class="btn btn-sm btn-primary input1"
                            onClick="userSave();">Save</button> &nbsp;
                        <br /> <br />
                    </div>

                </form><!-- end of purchase form -->





            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!--end of content body-->

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