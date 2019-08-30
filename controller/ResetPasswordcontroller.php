<?php 
/**
 * 
 */
class ResetPasswordcontroller extends Controller
{
	

		public function checkUserRegistration()
		{
			self::loadModel('ResetPasswordModel');
			ResetPasswordModel::ResetCandidatePassword();
		}



		public function _reset_password() 
		{
			error_reporting(0);
			self::loadModel('SessionModel');
			self::loadModel('email/Email');
			self::checkUserRegistration();
			self::loadView('candidate/log/forget-password');
		}



		# reset password after clicking to a email verified link # 
		public static function _reset_password_return()
		{
			SessionModel::start_session();
			error_reporting(0);

			// $_SESSION['resN'];
			// $_SESSION['resE'];
			// $_SESSION['registered_email_Token'];
			// $_SESSION['reset_password_link_token_'];

			if(isset($_GET['rmpn']) && !empty($_GET['rmpn']) && isset($_GET['rmpe']) && !empty($_GET['rmpe']) 
			&& isset($_GET['rmpt']) && !empty($_GET['rmpt']) && $_GET['regtkn'] && !empty($_GET['regtkn'])
			&& ($_SESSION['registered_email_Token'] == $_GET['regtkn']) ):
				
				self::loadView('candidate/rst-m-p');
				self::loadModel('ResetPasswordModel');

				# set password 
				if(isset($_POST['btn-reset-password']) && ($_POST['enter_password'] == $_POST['re_enter_password']) && !empty($_POST['enter_password']) && !empty($_POST['re_enter_password'])):
					ResetPasswordModel::_setpassword();
				else:
					exit;
				endif;
			else:
				setcookie('resetmypasscookie','');
				self::loadView('errors/404');
				exit;
			endif;
				
		}



}


 ?>