<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/demo_copy/path.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/demo_copy/admin/dashboard/smsSender.php");

/**
 * Code by SALAM CHARANJIT SINGH
 * Note Token regenerate wtih OTP reamining function:
 * 1. Maximum number of attempts to re-generate OTP by a single phone number per hour/day.
 * 2. Giving time boundary for generating new OTP.
 */

class Token
{
    /**
     * Checking number if Correct or not
     */
    public function checknumber()
    {
        $val =$_POST['mobile_number'];
        $checknumber = new SmsSender;

        // $checknumber->send_otp($val);

        if ($checknumber->check_mobile($val) == true) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Generates OTP
     * Donot forget to enable api token in smsSender.php
     */

    public function generate_otp()
    {
        $gotp = new SmsSender();
        $val = $_POST['mobile_number'];
        $otp = $gotp->send_otp($val);
        if ($otp == false) {
            $result = ["success" => 0, "msg" => "Number is not Valid"];
            return $result;
        } else {
            //checking if session is already set or not
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            //setting session expire time and generatig otp          
            $_SESSION['start_time'] = time();
            $_SESSION['expire_time'] = $_SESSION['start_time'] + (1 * 20); //add 20 seconds. Change 20 to 60 for 1 minute 
            $_SESSION['otp'] = $otp;
            $result = ["success" => 1, "msg" => "OTP Generate Expire Time 20sec <br>", "otp" => $otp];
            return $result;
        }
    }

    /**
     * Verifying OTP with the session time.
     */
    public function check_otp()
    {
        if ($_SESSION['expire_time'] >= time()) {
            if ($_POST['otp_check'] == $_SESSION['otp']) {
                $_SESSION['expire_time'] = null;
                $_SESSION['otp'] = null;

                //generating token                
                $token = rand(1111,9999).'-'.rand(1111,9999).'-'.rand(11111,99999);
                $result = ["success" => 1, "msg" => "Verification Success.<br> Your TOKEN NUMBER IS: <br>", "token" => $token];
                return $result;
            } else {
                $result = ["success" => 0, "msg" => "OTP not Match Please Retype OTP"];
                return $result;
            }
        } else {
            $result = ["success" => 2, "msg" => "OTP Expired or Alerady Used, Please Regenerate OTP."];
            return $result;
        }
    }
}

/**
 * Accessing the above Class Method via AJAX function from the check.php file
 */
$action = $_REQUEST['action'] ?? "";

if ($action != "") {
    if ($action == "sendotp") {
        $otp_obj = new Token;
        $numbercheck = $otp_obj->checknumber();
        if ($numbercheck == true) {
            $generate_otp = $otp_obj->generate_otp();
            echo json_encode($generate_otp);
        } else {
            $result = ["success" => 0, "msg" => "Number is not Valid Failed to generate OTP."];
            echo json_encode($result);
        }
    } elseif ($action == "verify") {
        $otp_obj = new Token;
        $otp_check = $otp_obj->check_otp();
        echo json_encode($otp_check);
    }
}