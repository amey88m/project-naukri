<?php 
/**
 * 
 */
class CandidateLogcontroller extends Controller
{
	
        public static function _log() 
        {
                self::loadModel('SessionModel');
	        self::loadModel('candidate/CandidateLogModel');
	        CandidateLogModel::CheckForLoginuserInput();
                self::loadView('candidate/log/login');
                
                if(isset($_SESSION['sess_token'])):
                        header('Location: candidate-profile?l-tk='.$_SESSION['sess_token']);
                endif;
                
                if(isset($_SESSION['adm_uid'])):
                        header("Location: empl-profile?login=".$_SESSION['token_log']);
                endif;
        }

	
}


 ?>