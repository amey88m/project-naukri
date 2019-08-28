<?php
namespace Email\Email;

require_once "vendor/autoload.php";
use \PHPMailer\PHPMailer\PHPMailer;
use \PHPMailer\PHPMailer\Exception;
include_once "inc/config.inc.php";



class Email
{

		
		public function email($subj,$to,$username,$body)
		{
				
			$mail = new PHPMailer(true);

			try{

				// $mail->SMTPDebug 	= 2;                          
				$mail->isSMTP();
				$mail->Host 		= 'smtp.mail.yahoo.com;smtp.gmail.com';  # 'smtp.gmail.com'
				$mail->SMTPAuth 	= true;                               
				$mail->Username 	= user;
				$mail->Password 	= password;
				$mail->SMTPSecure 	= 'tls';                            
				$mail->Port = 587;
				$mail->SMTPDebug = false;

			
				# Recipients
				$mail->setFrom('amey88_designer@yahoo.com', 'amey-nkri project');
				$mail->addAddress($to, $username);
				

				# To load the French version
				$mail->setLanguage('fr', '/optional/path/to/language/directory/');
				
				$mail->isHTML(true);
				$mail->Subject  = $subj;
				$mail->Body 	= $body;
				$mail->send();
				
			}catch(exception $e){
				
				// echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

			}

			
		}





}


 ?>