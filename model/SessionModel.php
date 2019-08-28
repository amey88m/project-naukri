<?php 
class SessionModel extends Model
{
	

	

	
		public static function start_session()
		{
			
			session_save_path($_SERVER['DOCUMENT_ROOT'] . '/project_naukri/' . '/session/');
			session_start();
			session_id();
			session_regenerate_id(true);
		}




		public static function log_session_candidate()
		{
			self::start_session();
			if(isset($_SESSION['sess_uid'])):
				header("Location: candidate-profile?l-tk=".$_SESSION['sess_token']);
				exit();
			endif;
		}




		public static function out_session_candidate()
		{
			self::start_session();
			if(!isset($_SESSION['sess_uid'])):
				header("Location: login");
				exit();
			endif;
		}




		public static function _log_outs_session_candidate()
		{
			self::start_session();
			if(!isset($_SESSION['sess_uid'])):
				header("location: candidate-signup");
				exit;
			endif;
		}




		public static function _log_session_hr()
		{
			self::start_session();
			// print $_SESSION['_HR_Rg_TOKEN'] . "<br>" . $_COOKIE['8_18_9_4'];
			if(isset($_SESSION['_HR_Rg_TOKEN']) && (isset($_COOKIE['8_18_9_4']) && !empty($_COOKIE['8_18_9_4']))):
				header("location: hr-login-admin?_81894={$_SESSION['_HR_ID']}&_is={$_SESSION['isemailvalide']}&_20_15_11_5_14={$_SESSION['_HR_TOK']}&_tok={$_SESSION['_HR_PRIVATE_TOKEN']}");
			endif;
		}



		public static function _out_session_hr()
		{
			self::start_session();
			if(!isset($_SESSION['_HR_Rg_TOKEN']) && (!isset($_COOKIE['8_18_9_4']) && empty($_COOKIE['8_18_9_4']))):
				header("location: hr-login?_id={$_SESSION['compid']}&_hr_reg_token={$_SESSION['_hr_link_token']}&_pvt_co_tok={$_SESSION['_private_token']}");
			endif;
		}

		

}



 ?>