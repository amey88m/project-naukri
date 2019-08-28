<?php 
class CandidateProfilecontroller extends Controller
{
	

		public static function success_profile()
		{
			
			self::loadModel('SessionModel');
			self::loadView('candidate/candidate-profile');
			
		}



		public static function _job_apply()
		{
			self::loadModel('SessionModel');
			self::loadView('candidate/jobs_applied');
		}


		public static function _job_status()
		{
			
			self::loadView('candidate/jobs_status');
			
		}

}



 ?>