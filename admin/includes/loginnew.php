<?php
session_start(); // Start a PHP session
include('../config/dbcon.php');

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

<body class="img js-fullheight" style="background-image: url(../assests/dist/img/bg.jpg);">
    <!-- <div class="position-relative">
        <div class="col-sm-6"> -->
    <h1>Login Page</h1>
    <?php if (isset($_SESSION['login_error'])) {
                echo "<p style='color: RED;' >". $_SESSION['login_error'] ."</p>"; 
                unset( $_SESSION['login_error']  );
             } 
        ?>
    <div class="page-content">
        <div class="form-v6-content">
            <div class="form-left">
                <img src="#" alt="" />
                </div>
            <form action="logincode.php" method="POST">
                <label>Username:</label><br>
                <input type="text" name="username"><br>

                <label>Password:</label><br>
                <input type="password" name="password"><br><br>

                <input type="submit" value="Login" name="submit">
            </form>

<!-- 
                <form class="form-detail" action="query_registration.php" method="post">
                    <h2>Register Form</h2>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name='phone' placeholder="Mobile Number">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-phone"></span>
                            </div>
                        </div>
                    </div> -->
            </div>

        </div>
    </div>
</body>

</html>