<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/demo_copy/path.php");
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    require '../../vendor/autoload.php';
                

class Add_user{
    public static function get_role(){
        global $db;
        $qry = "select * from roles where role_status = 1 ";
        $stmt = $db->prepare($qry);
        $resp = $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function save_user(){
        global $db;

        $result = ["success"=>0, "msg"=>"Internal Server Error."];

       

        $full_name = $_POST['full_name']??"";
        $email = $_POST['email']??"";
        $mobile = $_POST['mobile']??"";
        $designation = $_POST['designation']??"";
        $role_id = $_POST['role_id']??"";
        $gender = $_POST['gender']??"";
        //$officer_user_id = $_SESSION['user_id'];
        $officer_user_id = 1; //should get from session

        $req_field = [ $full_name,      $email,          $mobile,     $gender,     $role_id,  $designation,    $officer_user_id   ];
        
        if( ! $this->validate($req_field) ){
            $result["msg"] = "Input error.";
            return  $result;
        }




        $qry = "insert into temp_users (     full_name,      email,          mobile,     gender,     role_id, 
                                            designation,    officer_user_id, created_at     ) 
                                 value ( ?,?,?,?,?,     ?,?, now())";
        $stmt = $db->prepare($qry);
        $resp = $stmt->execute([ $full_name,      $email,          $mobile,     $gender,     $role_id, 
                                 $designation,    $officer_user_id,    ]);
        
        if(!$resp){
            $result["msg"] = "Failed to Save.";
            return  $result;
        }
        $result = ["success"=>1, "msg"=>"Successfully save."];               
        return $result ;
    }


    public function validate( $params = [] ){
        foreach($params as $key => $value ){
            if($value == "" || $value == NULL){
                return false;
            }
        }
        return true;
    }

    public function check_mobile( ){
        global $db;

        $result = ["success"=>0, "msg"=>"Internal Server Error."];

       

        $mobile = $_POST['mobile']??"";

        $req_field = [ $mobile ];
        
        if( ! $this->validate($req_field) ){
            $result["msg"] = "Input error.";
            return  $result;
        }
        $qry = "select T.*, O.officer_name, R.role_name from temp_users as T
                left join officer as O
                on T.officer_user_id = O.officer_id
                left join roles as R
                on T.role_id = R.role_id
                where T.mobile = ? ";
        $stmt = $db->prepare($qry);
        $resp = $stmt->execute([$mobile]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if(count($data) == 0){
            $result = ["success"=>0, "msg"=>"No Data Found."];
            return $result;
        }

        $result = ["success"=>1, "msg"=>"Loading data", "data"=> $data];
        return $result;
    }


    public function sendemail_verify($name, $email,$verify_token){
        $mail = new PHPMailer(true);
       
                      
        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'amubakekengbam@gmail.com';                     //SMTP username
            $mail->Password   = 'gzplcxdlabehmmck';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                            //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
           //Recipients
            $mail->setFrom('amubakekengbam@gmail.com', 'Mailer');
            $mail->addAddress('kekengbam10@gmail.com');     //Add a recipient
           // $mail->addReplyTo('info@example.com', 'Information');

        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = "TESTING";
            $mail->Body =" <a href='http://localhost/demo_copy/admin/includes/loginnew.php/".$verify_token."'>click</a>";
            $mail->AltBody = "This is the body in plain text for non-HTML mail clients";
        
            $mail->send();
            return 1;
            //echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
     }

    public function user_register( ){
        global $db;

        $result = ["success"=>0, "msg"=>"Internal Server Error."];

       

        $temp_user_id = $_POST['temp_user_id']??"";
        $password = $_POST['password']??"";
        $cpassword = $_POST['cpassword']??"";

        $req_field = [ $temp_user_id, $password, $cpassword  ];

        
        if( ! $this->validate($req_field) ){
            $result["msg"] = "Invalid Input.";
            return  $result;
        }
        if( $password !=  $cpassword ){
            $result["msg"] = "Password doesn't match.";
            return  $result;
        }

        $qry = "select * from temp_users where temp_user_id = ? ";

        $stmt = $db->prepare($qry);
        $resp = $stmt->execute([$temp_user_id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if(count($data) == 0){
            $result = ["success"=>0, "msg"=>"Data mismatch."];
            return $result;
        }

        $qry = "insert into users (     full_name,      email,           mobile,     gender,     role_id, 
                                        designation,    officer_user_id, password,   created_at,  verify_token, updated_at  ) 
                                 value ( ?,?,?,?,?,     ?,?,?,?,?,now())";
        $stmt = $db->prepare($qry);
        $resp = $stmt->execute([ $data['full_name'],      $data['email'],            $data['mobile'],     $data['gender'],     $data['role_id'], 
                                 $data['designation'],    $data['officer_user_id'],  $password,           $data['created_at']   , $data['verify_token']   ]);
        
        if(!$resp){
            $result["msg"] = "Failed to Save.";
            return  $result;
        }

        $name = $data['full_name'];
        $email = $data['email'];
        $verify_token = $data['verify_token'];
        $mail=$this->sendemail_verify("$name","$email","$verify_token");
        if($mail=1){
        $result = ["success"=>1, "msg"=>"Successfully save."];               
        return $result ;
        }
        
    }



}




$action = $_REQUEST['action']??"";


if($action != ""){
    $add_obj = new Add_user;

    $db->beginTransaction();

    $resp = ["success"=>0, "msg"=>"Internal Server Error."];
    switch($action){

        case "user_addition" : //ajax
            $resp = $add_obj->save_user();
            if($resp['success'] == 1){
                $db->commit();                
            }
            else{
                $db->rollback();      
            }
            echo json_encode( $resp );
        break;

        case "check_mobile" : //ajax
            $resp = $add_obj->check_mobile();
            if($resp['success'] == 1){
                $db->commit();                
            }
            else{
                $db->rollback();      
            }
            echo json_encode( $resp );
        break;

        case "user_register" : //ajax
            $resp = $add_obj->user_register();
            if($resp['success'] == 1){
                $db->commit();                
            }
            else{
                $db->rollback();      
            }
            echo json_encode( $resp );
        break;




        default :
            echo json_encode( $resp );
        break;
        
    }

    




}