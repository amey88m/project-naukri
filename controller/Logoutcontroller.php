<?php 
/**
 * 
 */
class Logoutcontroller extends Controller
{
	
	
		public static function logout()
		{
			self::loadView('candidate/logout');
			header("Location: login");
			// exit();
		}




}


 ?>