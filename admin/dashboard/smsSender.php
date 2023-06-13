
<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/demo_copy/path.php");

use Illuminate\Support\Facades\Session;


class SmsSender{
    //public static $otp_text = " is one time password for Issuing Product, High Court Inventory. -HCLSC";
    public static $otp_text = " is one time password for phone verification to register at High Court Legal Services Committee, Manipur. -HCLSC";



    public static function sendsms($mobileno, $message){

        $message = urlencode($message);
        $sender = 'HCLSCM'; 
        $apikey = '1274429253g162qmr86l39u2668ipr9vp8g2';
        $baseurl = 'https://instantalerts.co/api/web/send?apikey='.$apikey;

        $url = $baseurl.'&sender='.$sender.'&to='.$mobileno.'&message='.$message;    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_POST, false);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        // Use file get contents when CURL is not installed on server.
        if(!$response){
            $response = file_get_contents($url);
        }
        
    }



    public static function check_mobile(int $mobile){
        $mobileregex = "/^[6-9][0-9]{9}$/" ; 
        if( !preg_match($mobileregex,$mobile) ){
            return false;
        }
        return true;
    }


    public static function send_otp($mobile, $key){
        if( !self::check_mobile($mobile) ){
            return false;
        } 
        $otp=rand(1111,9999);
        Session::put([ $key => $otp,
                    'expiry_time' => 60*10
                ]);

        //$resp = self::sendsms($mobile, $otp.self::$otp_text);
        return true;
    }
    

    public static function resend_otp($mobile, $key){
        if( !self::check_mobile($mobile) ){
            return false;
        }
        if(Session::has($key)){
            $otp = Session::get($key);
        }
        else{
            $otp=rand(1111,9999);
            Session::put($key, $otp);
        }
        $resp = self::sendsms($mobile, $otp. self::$otp_text);
        return true;
    }

    public static function check_otp($otp, $key){
       
        if( !Session::has($key) ){
           return false;
        }
        
        if(  Session::get($key) !=  $otp){
            return false;
        }   

        return true;
    }
    

}