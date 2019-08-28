<?php 

use \Email\Email\Email as email;




class ResetPasswordModel extends Model
{
	
	
	public static $_reset_pass_err;
	public static $subj;
	public static $to;
	public static $cc;
	public static $bodymsg;
	protected static $username;
	

		public static function ResetCandidatePassword()
		{
			
			
			SessionModel::start_session();

			
			if(isset($_POST['reset_password_btn'])):

				$db = new Db;

				// escape string to prevent sql injection;
				$useremail = mysqli_real_escape_string($db->dbconnection(),$_POST['useremail']);

				// check for empty fields
				if(empty($useremail)):
					self::$_reset_pass_err = 1;
					ResetPasswordcontroller::loadError('Errors');
					ResetPasswordcontroller::loadError('_forgetpass-errorhtml');
				else:
					// validate & sanatize fields
					$f_email = filter_var($useremail, FILTER_VALIDATE_EMAIL);
					$s_email = filter_var($f_email, FILTER_SANITIZE_EMAIL);
				
					$email_regex = "/^[a-z]*([-_])?([a-z0-9_-]*)?\@(gmail.com)|(yahoo.com)+$/";

					if(empty($f_email) | empty($s_email) | !preg_match($email_regex, $s_email)):
						self::$_reset_pass_err = 6;
						ResetPasswordcontroller::loadError('Errors');
						ResetPasswordcontroller::loadError('_forgetpass-errorhtml');
					else:
						# CHECK FOR CANDIDATE`S IS EMAIL`REGISTERED` 
						$q = "SELECT canId FROM candsignup WHERE useremail='$s_email' LIMIT 1";
						$r = $db->numRows($q);
						$count = mysqli_num_rows($r);
						
						if(empty($count)):
							self::$_reset_pass_err = 3;
							ResetPasswordcontroller::loadError('Errors');
							ResetPasswordcontroller::loadError('_forgetpass-errorhtml');
						else:
							# CHECK FOR CANDIDATE `IS EMAIL IS VERIFIED`?
							$sql 		= "SELECT canId,name,username,useremail FROM candsignup WHERE useremail='$s_email' AND IsEmailValide='1'	LIMIT 1";
							$result 	= $db->numRows($sql);
							$rowscount	= mysqli_num_rows($result);

							# NOT COMPLETED THEIR REGISTRATION PROCESS YET
							# NOT VERIFICATY THEIR EMAIL ADDRESS
							
							if($rowscount == 0 ):
								self::$_reset_pass_err = 7;
								ResetPasswordcontroller::loadError('Errors');
								ResetPasswordcontroller::loadError('_forgetpass-errorhtml');
							else:
								# THEY HAVE SUCCESSFULLY VERIFYED THEIR EMAIL ADDRESS
								# SO SEND LINK TO GIVEN EMAIL ADDRESS
	$sql = "SELECT canId,name,username,useremail,IsEmailvalide,tokenEmail FROM candsignup WHERE useremail='$s_email' AND IsEmailValide='1' LIMIT 1";
								$result = $db->numRows($sql);
								$rowscount = mysqli_num_rows($result);
								
								#
								# SEND RESET PASSWORD LINK TO CANDIDATE`S EMAIL ADDRESS
								# 
								
								$result = $db->sql($sql);
								foreach($result as $r):
									// 
								endforeach;
									
									# session set 
									$_SESSION['resN'] = $r['username'];
									$_SESSION['resE'] = $r['useremail'];
									$_SESSION['registered_email_Token'] = $r['tokenEmail'];
									
									$forget_password = openssl_random_pseudo_bytes(24).uniqid('', true);
									$_SESSION['reset_password_link_token_'] = bin2hex($forget_password);
									
									error_reporting(0);
									setcookie('resetmypasscookie', $_SESSION['reset_password_link_token_'], time()+3600); # SET FOR 1 HOUR

									$email = new Email;
									self::$username = $_SESSION['n'];
									self::$subj 	= "Reset new password for mynaukriproject";
									self::$to 		= $s_email; 
									self::$bodymsg 	= "
									<h5>Pleaes check the below details:</h5>
									<h5>Email to : $s_email</h5><br>
									<p>Now,you can reset your password just by clicking the below link!</p>
									<a href='http://127.0.0.1/project_naukri/set-my-password?rmpn=".$_SESSION['resN']."&rmpe=".$_SESSION['resE']."&rmpt=".$_SESSION['reset_password_link_token_']."&regtkn=".$_SESSION['registered_email_Token']."'>Reset my password now</a>
													";
									$email->email(self::$subj,self::$to,self::$username,self::$bodymsg);
									self::$_reset_pass_err = 4;
									ResetPasswordcontroller::loadError('Errors');
									ResetPasswordcontroller::loadError('_forgetpass-errorhtml');
							endif;
						endif;
					endif;	
				endif;
			endif;
		}

	
	
		public static function _setpassword()
		{
			$db = new Db; 
			// $_SESSION['resN'];
			// $_SESSION['resE'];
			// $_SESSION['registered_email_Token'];
			// $_SESSION['reset_password_link_token_'];

			$enter_password		 	= trim($_POST['enter_password']);
			$re_enter_password 		= trim($_POST['re_enter_password']);
			
			$q = "UPDATE candsignup SET userpassword='$enter_password' WHERE tokenEmail='".$_SESSION['registered_email_Token']."' AND useremail='". $_SESSION['resE']."'  LIMIT 1";
			$db->numRows($q);
			self::$_reset_pass_err = 8;
			ResetPasswordcontroller::loadError('Errors');
			ResetPasswordcontroller::loadError('_forgetpass-errorhtml');

		}


}


 ?>