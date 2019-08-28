<?php 
use \Email\Email\Email as email;



class SendHREmail
{
	
	private static $subj;
	private static $to;
	private static $username;
	private static $body;
	private static $user_name;
	private static $user_email;
	private static $j_arr; // json to array
	public static $_hr_signup_email_link_err = 0;


	
	private static $allow_origin = Array(
											'http://127.0.0.1',
											'http://mynaukri.com'
										);





				public static function sendEmailInput()
				{


					SessionModel::start_session();

				
					# preflight requests
					if(isset($_SERVER['HTTP_ORIGIN']) == true):

						if(in_array($_SERVER['HTTP_ORIGIN'], self::$allow_origin)):
							header('Access-Control-Allow-Origin: ' .$_SERVER['HTTP_ORIGIN']);
							header('Access-Control-Allow-Credentials: true');
							header('Access-Control-Allow-Method: POST');
							header('Access-Control-Allow-Headers: content-Type');
							
									
									if(isset($_POST['hrlogtok']) && !empty($_POST['hrlogtok'])):
										
										if( $_POST['hrlogtok'] == $_SESSION['token_log'] 
										&& $_COOKIE['tkl'] == $_POST['hrlogtok'] 
										&& $_SESSION['token_log'] == $_COOKIE['tkl'] ):

											// DB CONNECTION
											$db = new Db;

											// convert json into js array
											self::$j_arr = json_decode($_POST['user'], true);
											
											# escape string to prevent sql inj
											self::$user_name = mysqli_real_escape_string($db->dbconnection(), trim(self::$j_arr['user']));
											self::$user_email = mysqli_real_escape_string($db->dbconnection(), trim(self::$j_arr['email']));
											
											# SANITIZE INPUT FIELDS
											self::$user_name = filter_var( self::$user_name, FILTER_SANITIZE_STRING );
											self::$user_email = filter_var( self::$user_email, FILTER_SANITIZE_STRING );
											
											
												### check for value 
												if(empty(self::$user_name) | empty(self::$user_email)):
													exit();
												else:
													########## TOKEN FOR HR REGISTRATION LINK ######
													$_email_reg_token_generate = openssl_random_pseudo_bytes(23);
													$_email_reg_token = bin2hex($_email_reg_token_generate);
													########## ID FOR HR REGISTATION #######
													$_hr_reg_id = uniqid(true);
													### SESSION
													$_SESSION['hrregid']	= $_hr_reg_id;
													$_SESSION['hrregtoken'] = $_email_reg_token;

													self::$subj = "HR Registration form send by '".$_SESSION['hrname']."'";
													// self::$to = self::$user_email;
													self::$username = self::$user_name;
													self::$body = '	
													send From : "'.$_SESSION["hrname"].'" <br>
													send From Email : "'.$_SESSION["hremail"].'" <br>
													Welcome "'.self::$user_name.'", how are you? you have to follow the following 
													instructions: <br>
													1. click the below link <br>
													2. Signup with your basic details by filling the one time form <br>
													3. once you fill with the sign up form you can login <br>
													4. make sure to tell "'.$_SESSION["hrname"].'" to remain login during your click on (belowed) `signup hr form`. else "'.$_SESSION["hrname"].'" has to resend you a link-hr-registation <br>

<a href="http://127.0.0.1/project_naukri/hr-signup-form?link-hrrg-token='.$_email_reg_token.'&link-hrrg-id='.$_hr_reg_id.'&bytok='.$_SESSION["_private_token"].'&bytokn='.$_SESSION["hrname"].'&bytoke='.$_SESSION["hremail"].'&id='.$_SESSION["compid"].'" target="_blank"> HR SIGNUP HERE </a>
												';
												# bytok => send by company hr 
													$mail = new email;
													$mail->email(self::$subj, self::$user_email,self::$user_name,self::$body);
													
													# success alert
													self::$_hr_signup_email_link_err =  1;
													HrSignupFormcontroller::loadError('Errors');
            										HrSignupFormcontroller::loadError('_hr-errorhtml');
												endif;
											else:
											exit();	
										endif;
									else:
										exit();
									endif;
						else:
							exit();
						endif;
					endif;
						
				}


	
}

SendHREmail::sendEmailInput();



?>