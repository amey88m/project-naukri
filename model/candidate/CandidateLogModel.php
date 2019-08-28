<?php 
class CandidateLogModel extends Model
{
	
	
	public static $_get_err_val;



				public function CheckForLoginuserInput()
				{

					SessionModel::start_session();


					if(isset($_POST['candidate_login'])):

						$db = new Db;	
						$db->dbconnection();

						# esc string to prevent sql injection
						$uemail = mysqli_real_escape_string($db->dbconnection(), $_POST['uemail']);
						$upass  = mysqli_real_escape_string($db->dbconnection(), $_POST['upassword']);
						
						
						if(empty($uemail)):
							
							self::$_get_err_val = 1;
							CandidateLogController::loadError('Errors');
							CandidateLogController::loadError('_error-loghtml');

						elseif(empty($upass)):

							self::$_get_err_val = 2;
							CandidateLogController::loadError('Errors');
							CandidateLogController::loadError('_error-loghtml');

						else:

							// check for user is registered user 
							$sql = "SELECT canId FROM candsignup WHERE useremail='$uemail' AND userpassword='$upass' LIMIT 1 ";

							$result 	= $db->numRows($sql);
							$rowcount 	= mysqli_num_rows($result);
							$count 		= $db->sql($sql);

							if( $rowcount == 0):
								self::$_get_err_val = 3;
								CandidateLogController::loadError('Errors');
								CandidateLogController::loadError('_error-loghtml');
							else:
								# CHECK FOR CANDIDATE HAS VERIFIED THEIR EMAIL
								# IF 0 -> NOT VERIFIED
								# IF 1 -> VERIFIED
								$q = "SELECT canId FROM candsignup WHERE useremail='$uemail' AND userpassword='$upass' AND IsEmailvalide='1' LIMIT 1 ";
								$c = $db->numRows($q);
								$rc = mysqli_num_rows($c);
								if(empty($rc)):
									self::$_get_err_val = 7;
									CandidateLogController::loadError('Errors');
									CandidateLogController::loadError('_error-loghtml');
								else:
									$sql = "SELECT canId,name,username,useremail,qualification,otherqualification,coursecertified,skills FROM candsignup WHERE useremail='$uemail' AND userpassword='$upass' LIMIT 1  ";
									$result = $db->sql($sql);
									if(is_array($result)):
										foreach($result as $val):
										endforeach;
									endif;
									// set session
									$_SESSION['c_login_sess'] = uniqid('', true).time();
									$_SESSION['sess_auth_id'] = 'EIW834'.mt_rand().'3748201'.uniqid('', true);
									$_SESSION['sess_token']   = mt_rand().uniqid('',true).time();
									$_SESSION['sess_uid']	  = uniqid().time();
									$_SESSION['sess_email']   	= $uemail;
									$_SESSION['canId'] 		    = $val['canId'];
									$_SESSION['sess_user'] 		= $val['name'];
									$_SESSION['sess_user_name'] = $val['username'];
									setcookie('clsc',$_SESSION['sess_token'], 0);
									header('Location: candidate-profile?l-tk='.$_SESSION['sess_token']);
									exit();
								endif;
							endif;
						endif;
				else:
					// header("Location: login.php?cid=invalid");
					// exit();
				endif;

				}

}


 ?>