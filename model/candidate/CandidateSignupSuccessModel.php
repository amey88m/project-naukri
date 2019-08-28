<?php 

use \Email\Email\Email as email;



class CandidateSignupSuccessModel extends Model
{


		public  static $bodymsg;
		public static $_get_cand_sign_err_val;
		public static $_is_email_verified = 0;




		public static function _check_candidate_email_is_verified_()
		{
			error_reporting(0);

			$db = new Db;
			$q = "SELECT useremail,tokenEmail FROM candsignup WHERE useremail='{$_GET['mail']}' ";
			$result = $db->sql($q);
			
			foreach($result as $v):
				// 
			endforeach;
			
			
			if($_GET['verifytoken'] == $_SESSION["c_reg_token"] && $_GET['verifytoken'] == $v['tokenEmail'] && $_GET['verifytoken'] == $_COOKIE['emailverifysignupcookie'] && $_COOKIE['emailverifysignupcookie'] == $v['tokenEmail'] && $_GET['mail'] == $v['useremail'] && isset($_GET['cssm'])):
				# make email 
				$q = "UPDATE candsignup SET IsEmailValide='1' WHERE useremail='".$_GET['mail']."' AND tokenEmail='".$_COOKIE['emailverifysignupcookie']."'  ";
				$db->numRows($q);
				return self::$_is_email_verified = 1;
				exit;
			else:
				# else delete row 
				$q = "DELETE FROM candsignup WHERE useremail='{$_GET['mail']}' ";
				$result = $db->numRows($q);
				return self::$_is_email_verified = 0;
				exit;
            endif;
		}




		public function check_candidate_reg_form_input()
		{		

				SessionModel::start_session();
				$db = new Db;

				// escape string to prevent sql injection
				$firstname 		= mysqli_real_escape_string($db->dbconnection(), $_POST['firstname']);
				$fathername 	= mysqli_real_escape_string($db->dbconnection(), $_POST['fathername']);
				$lastname 		= mysqli_real_escape_string($db->dbconnection(),$_POST['lastname']);

				


				if(is_array($_POST['qualification'])):
					foreach($_POST['qualification'] as $val):
						// 
					endforeach;
				endif;


				$qualification 		= mysqli_real_escape_string($db->dbconnection(),$val);
				$otherQualifiction 	= mysqli_real_escape_string($db->dbconnection(), $_POST['otherqualification']);
				$course 			= mysqli_real_escape_string($db->dbconnection(), $_POST['course']);
				$selfDesc 		 	= mysqli_real_escape_string($db->dbconnection(), $_POST['selfDesc']);
				$skills				= mysqli_real_escape_string($db->dbconnection(), $_POST['skills']);
				$username 			= mysqli_real_escape_string($db->dbconnection(), $_POST['username']);
				$s_email 			= mysqli_real_escape_string($db->dbconnection(), $_POST['useremail']);
				$pass 			 	= mysqli_real_escape_string($db->dbconnection(), $_POST['userpassword']);
				

				// check the value empty
				if(empty($username ) | empty($s_email) | empty($pass)):
					
					self::$_get_cand_sign_err_val = 1;
					CandidateSignupSuccessController::loadError('Errors');
					CandidateSignupSuccessController::loadError('_errorhtml');

				else:
					// validate inputs & sanatize 
					$f_email 	= filter_var($s_email, FILTER_VALIDATE_EMAIL);
					$sani_email = filter_var($f_email, FILTER_SANITIZE_EMAIL);
					
					if(empty($sani_email)):

						self::$_get_cand_sign_err_val = 2;
						CandidateSignupSuccessController::loadError('Errors');
						CandidateSignupSuccessController::loadError('_errorhtml');	
					else:
						// check the user is already registerd with us 
						$sql = "SELECT canId FROM  candsignup WHERE useremail='{$_POST['useremail']}'";
						$result 	= $db->numRows($sql);
						$rowscount  = mysqli_num_rows($result);


						if($rowscount > 0):

							self::$_get_cand_sign_err_val = 3;
							CandidateSignupSuccessController::loadError('Errors');
							CandidateSignupSuccessController::loadError('_errorhtml');	

						else:
							error_reporting(0);
							self::$_get_cand_sign_err_val = 4;
							CandidateSignupSuccessController::loadError('Errors');
							CandidateSignupSuccessController::loadError('_errorhtml');	

							## @@ generate token @@@ ###
							$_SESSION['c_reg_token'] = bin2hex(openssl_random_pseudo_bytes(23));
							$c_reg_id = uniqid('', true);
							
							$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
							$date_format = $date->format('d-m-y H:i:s:a');
							// session-cookie to log candidate valide - 1day only
							setcookie('emailverifysignupcookie', $_SESSION['c_reg_token'] ,time()+300,'127.0.0.1/project_naukri/session/','127.0.0.1',0); // COOKIES SET FOR 1 HOURS

							$email = new email;
							self::$bodymsg = " 
								<h4>Hello, {$firstname} </h4> <br>
								<span style='color:#f02'>your email is: {$sani_email} </span> <br>
								<p>Thank you for registration with us. Now, you almost done with your registration steps. 
									Please click the verification link below to complete the registration process.
									<br>
									Thank you.
								</p>
<a href='127.0.0.1/project_naukri/candidate-signup-email-varify.php?cssm=1&verifytoken={$_SESSION["c_reg_token"]}&cid={$c_reg_id}&mail={$sani_email}'>
								click this link to complete the registeration process.
								</a>
								";


							$email->email('candidate\'s signup email verification link',$sani_email,$firstname, self::$bodymsg);
							
							// set session-cookie for all data - only for 24 hrs;
							// once candidate is verified, redirect him/her to upload resume-pg
							// check validation resume
							// successfully registered.

							// register success
							$query = "INSERT INTO candsignup(name,fname,lname,username,useremail,IsEmailValide,userpassword,otherqualification,qualification,coursecertified,selfdescription,tokenEmail,date,skills,c_reg_id) VALUES('$firstname','$fathername','$lastname','$username','$sani_email',0,'$pass','$otherQualifiction','$qualification','$course','$selfDesc','{$_SESSION['c_reg_token']}',NOW(),'$skills','$c_reg_id')";
							$result = mysqli_query($db->dbconnection(), $query);
						endif;
					endif;
					
				endif;
				



		}


}


?>

