<?php
$success = "";
$error_message = "";
$verify_status = 0;
require_once($_SERVER['DOCUMENT_ROOT']. "/demo_copy/path.php");
if(!empty($_POST["submit_email"])) {
	$result = mysqli_query($conn,"SELECT * FROM users WHERE email='" . $_POST["email"] . "'");
	$count  = mysqli_num_rows($result);
	if($count>0) {
		// generate OTP
		$otp = rand(100000,999999);
		// Send OTP
		require_once("mail_function.php");
		$mail_status = sendOTP($_POST["email"],$otp);
		
		if($mail_status == 1) {
			$result = mysqli_query($conn,"INSERT INTO otp_expiry(mail_id,otp,is_expired,create_at) VALUES ('".$_POST['email']."','" . $otp . "', 0, '" . date("Y-m-d H:i:s"). "')");
			$current_id = mysqli_insert_id($conn);
			
			if(!empty($current_id)) {
				$verify_status=1;			
			}		
		}
	} else {
		$error_message = "Email not exists!";
	}
}
if(!empty($_POST["submit_otp"])) {
	$result = mysqli_query($conn,"SELECT * FROM otp_expiry WHERE otp='" . $_POST["otp"] . "' AND is_expired!=1 AND NOW() <= DATE_ADD(create_at, INTERVAL 24 HOUR)");
	$count  = mysqli_num_rows($result);
	if(!empty($count)) {
		$result = mysqli_query($conn,"UPDATE otp_expiry SET is_expired = 1 WHERE otp = '" . $_POST["otp"] . "'");
		$result2 = mysqli_query($conn,"UPDATE users SET verify_status = '1' WHERE  user_id = '".$_SESSION["auth_user"]["user_id"]."'");
		if(mysqli_affected_rows($conn) >0 ){
			$verify_status = 2;	
		}else{
			// echo $_SESSION["auth_user"]["user_id"];
			// echo 'failed';
			// echo mysqli_error($conn);
			$verify_status =1;
			$error_message = "Server Error";
		} 
		
	} else {
		$verify_status =1;
		$error_message = "Invalid OTP!";
	}	
}
?>
<?php
	if(!empty($error_message)) {
?>
<div class="message error_message"><?php echo $error_message; ?></div>
<?php
	}
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



        <form name="frmUser" method="post">
            <div class="tblLogin">
                <?php 
			if(!empty($verify_status == 1)) { 
		?>
                <div class="row">
                    <div class="col-8">
                        <div class="tableheader">Enter OTP</div>
                        <p>Check your email for the OTP</p>
                    </div>
                </div>
                <div class="tablerow">
                    <input type="text" name="otp" placeholder="One Time Password" class="login-input" required>
                </div>
                <div class="tableheader"><input type="submit" name="submit_otp" value="Submit" class="btnSubmit"></div>
                <?php 
			} else if ($verify_status == 2) {
				if(session_destroy()) {
								echo '<script>
				alert("Succesfully Activated! Please Re-Login");
				window.location.href="loginnew.php";
				</script>';
					}
        ?>
                <?php
			}
			else {
		?>

                <div class="row">
                    <div class="col-8">
                        <div class="tableheader">Enter Your Login Email</div>
                        <div class="tablerow"><input type="text" name="email" placeholder="Email"
                                value="<?= $_SESSION['auth_user']['email'] ?>" class="login-input" readonly required>
                        </div>
                        <div class="tableheader"><input type="submit" name="submit_email" value="Submit"
                                class="btnSubmit">
                        </div>

                    </div>
                </div>
                <?php 
			}
		?>
            </div>
        </form>
</body>

</html>