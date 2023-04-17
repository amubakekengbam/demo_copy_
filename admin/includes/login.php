<?php

 session_start();
include("header.php");
?>
 <?php 
          $http = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on'? "https://" : "http://";

          $url = $http . $_SERVER["SERVER_NAME"].'/demo_copy/admin/';
          
          ?>


<body class="img js-fullheight" style="background-image: url(../assests/dist/img/bg.jpg);">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                              <?php
           include('message.php');
		            ?>
                    <h2 class="heading-section">Login </h2>
                </div>
            </div>

            <form class="row justify-content-center" action="<?= $url?>includes/logincode.php" method="POST">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                        <h3 class="mb-4 text-center">vehicle Managment System</h3>
                        <form action="#" class="signin-form">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Username" name="username" >
                            </div>
                            <div class="form-group">
                                <input id="password-field" type="password" name="password" class="form-control" placeholder="Password"
                                    >
                                <span toggle="#password-field"
                                    class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <div class="form-group">
                                <label class="form-group"> Select user type</label>
                            </div>
                            <select class="form-group" name="category">
                                <option selected value="User">User</option>
                                <option selected value="Admin">Admin</option>
                                <option selected value="Officer">Officer</option>
                                <option selected value="Driver">Driver</option>
                                <option selected value="CPC">CPC</option>
                                <option selected value="Register">Register</option>
                            </select>
                            <br></br>
                            <div class="form-group">
								<input type="submit" class="btn btn-primary" value="submit" name="submit">
                            </div>                        
                        </form>                   
                    
                    </div>
                </div>
            </form>
        </div>
    </section>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>


<?php
include("footer.php");
?>