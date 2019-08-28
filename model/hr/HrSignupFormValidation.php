<?php 

class HrSignupFormValidation extends Model
{
	

	private static $name;
	private static $email;
	private static $password;
	private static $filt_name;
	private static $filt_email;
	private static $date_of_birth;
	private static $phone;
	public static $_hr_errors = 0;


	

				public static function _hr_signup_form_validate()
				{

					SessionModel::start_session();

					# check for security using token and cookie 

					if(isset($_POST['form'])):
						
						$db = new Db;
						$db->dbconnection();

						# It takes a json endcoded string and convert into obj 
						# if 'true' => assoc array
						$j_d_data = json_decode($_POST['form'], true);
						
						# escape string to prevent sql inj.
						self::$name 	= mysqli_real_escape_string($db->dbconnection(), $j_d_data['name']);
						self::$email 	= mysqli_real_escape_string($db->dbconnection(), $j_d_data['email']);
						self::$password = mysqli_real_escape_string($db->dbconnection(), $j_d_data['pass']);
						self::$date_of_birth = mysqli_real_escape_string($db->dbconnection(), $j_d_data['dob']);
						self::$phone 	= mysqli_real_escape_string($db->dbconnection(), $j_d_data['phone']);
						
						# session generate to handle erro`s
						$_SESSION['_hr_login_name'] = self::$name;
						


						# check for empty fields
						if(empty(self::$name) | empty(self::$email) | empty(self::$password)):
							self::$_hr_errors = 1;
							HrSignupFormcontroller::loadError('Errors');
							HrSignupFormcontroller::loadError('_hr-error-loghtml');
							exit();
						else:
							# sanitize input
							self::$filt_name  = filter_var(self::$name, FILTER_SANITIZE_STRIPPED);
							self::$filt_email = filter_var(self::$email, FILTER_SANITIZE_EMAIL);

							# check for password security
							if(strlen(self::$password) < 6):
								self::$_hr_errors = 2;
								HrSignupFormcontroller::loadError('Errors');
            					HrSignupFormcontroller::loadError('_hr-error-loghtml');
								exit();
							else:
								$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
								$cur_time = $date->format('y-m-d H:i:s:a');
								$_SESSION['hr_rg_date'] = $cur_time;
								
								# check the user is re-registering
								$sql = "SELECT HRId FROM hrlogin WHERE HREmail = '".self::$filt_email."'  LIMIT 1";
								$result 	= $db->numRows($sql);
								$rowscount  = mysqli_num_rows($result);
								

								if($rowscount != 0):
									# user exits
									self::$_hr_errors = 3;
									HrSignupFormcontroller::loadError('Errors');
            						HrSignupFormcontroller::loadError('_hr-error-loghtml');
            						exit();
								else:
									# GENERATE SESSION TOKEN FOR HR LOGIN
									$_SESSION['_hr_login_token_'] = bin2hex(openssl_random_pseudo_bytes(32).uniqid('',true));
									#
									# setcookie('_hr_login_token_', $_SESSION['_hr_login_token_'], time()+3600);
									
									# insert
									// $_SESSION['compId'];
$sql = "INSERT INTO hrlogin(HRName,HREmail,HRPass,HRPic,HRDOB,compId,Rg_date,IsValidEmail,phone,hr_rg_token) 
VALUES('".self::$filt_name."', '".self::$filt_email."', '".self::$password."','avatar-girl.png','".self::$date_of_birth."','".$_SESSION['comp_id']."' , '".$_SESSION['hr_rg_date']."', 1 ,'".self::$phone."', '{$_SESSION['_hr_login_token_']}' )";
									$result = $db->numRows($sql);
									self::$_hr_errors = 4;
									HrSignupFormcontroller::loadError('Errors');
            						HrSignupFormcontroller::loadError('_hr-error-loghtml');
									exit();	
								endif;
							endif;
						endif;
					endif;

					
				}
	
}






?>