<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/demo_copy/path.php");

$http = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on'? "https://" : "http://";

$url = $http . $_SERVER["SERVER_NAME"].'/demo_copy/admin/';


?>

<?php 
          $http = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on'? "https://" : "http://";

          $url = $http . $_SERVER["SERVER_NAME"].'/demo_copy/admin/';
          
          ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>VMS</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=$url?>assests/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?=$url?>assests/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=$url?>assests/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page" style="min: height 100%;    background-size:100%; 
 background-image: url(../assests/dist/img/high_court.jpg);background-repeat: no-repeat;">
<div class="login-box">
  <div class="login-logo">
    <h3 class="text-white"><b>Vehicle Management System</b></h3>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">SIGN IN NOW</p>
      <?php if (isset($_SESSION['login_error'])) {
                            echo "<p style='color: RED;' >". $_SESSION['login_error'] ."</p>"; 
                            unset( $_SESSION['login_error']  );
                        } 
                    ?>
      <form action="logincode.php" method="POST">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Email/Phone Number" name="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">      
          <div class="col-4">
            <input type="submit" value="Login" name="submit" class="btn btn-primary btn-block">            
          </div>
          <!-- /.col -->
        </div>
      </form>  
      <p class="mb-0">
        
        <a href="<?php echo $url?>form/frm_registration.php" class="text-center">Register?</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?=$url?>assests/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=$url?>assests/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=$url?>assests/dist/js/adminlte.min.js"></script>
</body>
</html>