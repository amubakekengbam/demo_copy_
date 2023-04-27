<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/demo_copy/path.php");

$http = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on'? "https://" : "http://";

$url = $http . $_SERVER["SERVER_NAME"].'/demo_copy/admin/';


?>

<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../assests/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../assests/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../assests/dist/css/adminlte.min.css">
</head>

<body class="login-page" style="min-height: 496.781px; background-image: url(../assests/dist/img/high_court.jpg);">
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>Vehicle Management System <b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <?php if (isset($_SESSION['login_error'])) {
                            echo "<p style='color: RED;' >". $_SESSION['login_error'] ."</p>"; 
                            unset( $_SESSION['login_error']  );
                        } 
                    ?>

                <form action="logincode.php" method="POST">
                    <label>Username:</label><br>
                    <input type="text" name="username"><br>

                    <label>Password:</label><br>
                    <input type="password" name="password"><br><br>

                    <input type="submit" value="Login" name="submit">
                </form>
            </div>
        </div>
    
    </div>
</body>
<!-- 
<?php 

include("../includes/footer.php");
?> -->
</html>