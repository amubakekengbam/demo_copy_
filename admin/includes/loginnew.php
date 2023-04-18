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

<body class="img js-fullheight" style="background-image: url(../assests/dist/img/bg.jpg);">
    <!-- <div class="position-relative">
        <div class="col-sm-6"> -->
    <div class="col-md-3 offset-md-4">
        <h1>Login Page</h1>
        <?php if (isset($_SESSION['login_error'])) {
                            echo "<p style='color: RED;' >". $_SESSION['login_error'] ."</p>"; 
                            unset( $_SESSION['login_error']  );
                        } 
                    ?>
        <div class="page-content">
            <div class="form-v6-content">
                <div class="row">
                    <img src="#" alt="" />
                </div>
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

</html>