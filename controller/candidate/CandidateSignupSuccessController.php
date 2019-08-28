<?php 
class CandidateSignupSuccessController extends Controller
{
    
	
        public static function _signup()
        {
            SessionModel::start_session(); 
            if(isset($_SESSION['sess_token'])):
                header('Location: candidate-profile?l-tk='.$_SESSION['sess_token']);
            endif;
            self::loadView('candidate/signup/candidate-signup');
        }
    
        
        public static function _signup_success()
        {
            //self::loadModel('Model');
            self::loadModel('SessionModel');
            self::loadModel('candidate/CandidateSignupSuccessModel');
            self::loadModel('email/Email');
            CandidateSignupSuccessModel::check_candidate_reg_form_input(); 
        }


        # after clicking email verification link from user is registered user
        public static function _is_signup_verified_link_clicked()
        {
            // ini_set('display_errors',0);
            SessionModel::start_session();
            CandidateSignupSuccessModel::_check_candidate_email_is_verified_();
            
            if(CandidateSignupSuccessModel::$_is_email_verified == 1):
                self::loadView("e-v-success");
                exit;
            else:
                self::loadView("errors/404");
                exit;
            endif;   
        }


}


 ?>