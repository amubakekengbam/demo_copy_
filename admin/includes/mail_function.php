<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/demo_copy/path.php");
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    require '../../vendor/autoload.php';

  
	function sendOTP($email,$otp) {

        $mail = new PHPMailer(true);
	

        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'amubakekengbam@gmail.com';                     //SMTP username
        $mail->Password   = 'gzplcxdlabehmmck';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                            //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
       //Recipients
        $mail->setFrom('amubakekengbam@gmail.com', 'Mailer');
        $mail->addAddress($email);     //Add a recipient
       // $mail->addReplyTo('info@example.com', 'Information');

	
		 $message_body = "One Time Password for PHP login authentication is:<br/><br/>" . $otp;
		// $mail = new PHPMailer();
		// $mail->IsSMTP();
		// $mail->SMTPDebug = 0;
		// $mail->SMTPAuth = TRUE;
		// $mail->SMTPSecure = 'tls'; // tls or ssl
		// $mail->Port     = "SMTP port";
		// $mail->Username = "amu";
		// $mail->Password = "SMTP Password";
		// $mail->Host     = "SMTP HOST";
		// $mail->Mailer   = "smtp";
		// $mail->SetFrom("FROM EMAIL", "FROM NAME");
		// $mail->AddAddress($email);
		// $mail->Subject = "OTP to Login";
		// $mail->MsgHTML($message_body);
		// $mail->IsHTML(true);		
		// $result = $mail->Send();
		
		// return $result;
               
            //Content
            $mail->Subject = "OTP to Login";
            $mail->MsgHTML($message_body);
            $mail->IsHTML(true);		
            if(!$mail->Send()){
				return 0;
		}else {
				return 1;
		}	
         
	}
?>