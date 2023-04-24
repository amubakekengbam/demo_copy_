<?php
require_once("../../path.php");
require_once(FORM."/qry_add_user.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../assests/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../assests/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../assests/dist/css/adminlte.min.css">
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">


        </div>

        <div class="page-content">
            <div class="form-v6-content">
                <div class="form-left">
                    <img src="#" alt="form" />
                </div>
                <div class="alert">
                    <?php 
                    if(isset($_SESSION['status'])){
                        echo"<h4>".$_SESSION["status"]."<h4>";
                        unset($_SESSION['status']);
                    }
                    ?>
                </div>
                <form class="form-detail" name="register-form"  id="register-form"  method="post">
                    <h2>Register Form</h2>
                    <input type="hidden" class="form-control" name='action' id="action_id" value="user_register"  >
                    <input type="hidden" class="form-control" name='temp_user_id' id='temp_user_id' >
                    <div>
                        <label for="full_name">Mobile:</label>
                        <input type="text" class="form-control input1" name='phone' id='phone' placeholder="Mobile Number">
                        <button type="button" value='check_number'  id='check_number_btn' class="btn btn-primary"
                            onClick="checkMobile();">Validate</button>
                    </div>
                    <div id="extend-form" style="display: none;">

                        <div class="mb-3">
                            <label for="full_name">Full Name:</label>
                            <input type="text" class="form-control input1" name="full_name" id="full_name"
                                placeholder="Full name">
                        </div>
                        <div class=" mb-3">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control input1" name="email" id="email" placeholder="Email">
                        </div>
                       
                        <div class="mb-3">
                            <div class="form-group">
                                <label>Gender</label>
                                <input type="hidden" class="form-control input1" name="gender" id="gender" required/>
                                <input type="text" class="form-control input1" name="gender_text" id="gender_text" required/>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="role_name">Select User Role:</label>
                                <input type="hidden" class="form-control input1" name="role_id" id="role_id" required />
                                <input type="text" class="form-control input1" name="role_name" id="role_name" required />
                            </div>
                        </div>

                        <div>
                            <label for="officer_name ">Officer Name:</label>
                            <input type="text" class="form-control input1" name='officer_name' id='officer_name' placeholder="Officer Name">
                        </div>


                        <div class="mb-3">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" name='password' placeholder="Password">
                        </div>
                        <div class="mb-3">
                            <label for="password">Confirm Password:</label>
                            <input type="password" class="form-control" name='cpassword' placeholder="Retype password">
                        </div>


                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                    <label for="agreeTerms">
                                        I agree to the <a href="#">terms</a>
                                    </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <button type="button" value="Register" class="btn btn-primary btn-block"
                                    name="register" onClick="register_user();" >Register</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </div>
                </form>
                <div class="social-auth-links text-center">
                    <p>- OR -</p>
                    <a href="../includes/loginnew.php" class="btn btn-block btn-primary">
                        <i class="mr-2"></i>
                        LOGIN
                    </a>
                </div>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="../assests/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../assests/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../assests/dist/js/adminlte.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#role').on('change', function() {
            var role = this.value;
            if (role == 'Driver') {
                $('#oName').removeAttr('hidden');
                $('#oName').attr({
                    style: "display:block;"
                });
            } else {
                $('#oName').attr({
                    style: "display:none;"
                });
                $('#oName').addClass('hidden');
                console.log(role);
            }

        });
    });
    </script>

    <script>
    var qry_url = "<?=  URL_FORM."/qry_add_user.php" ?>";
    </script>


    <script src="<?= URL_JS ?>/registration.js"></script>



</body>

</html>