<?php 
class EmplLogcontroller extends Controller
{
        
    
        public static function _login()
        {
            
            SessionModel::start_session();

            # CHECK FOR CANDIDATE LOGIN
            if(isset($_SESSION['sess_token'])):
                header('Location: candidate-profile?l-tk='.$_SESSION['sess_token']);
            endif;
            # CHECK FOR EMPLYOER LOGIN
            if(isset($_SESSION['adm_uid'])):
                header("Location: empl-profile?login=".$_SESSION['token_log']);
            else:
                EmplLogModel::_emp_login();
                self::loadView('./empl/signup/empl-login');
            endif;
            


        }
	


        public static function _signup()
        {
            SessionModel::start_session();

            # CHECK FOR CANDIDATE LOGIN
            if(isset($_SESSION['sess_token'])):
                header('Location: candidate-profile?l-tk='.$_SESSION['sess_token']);
            endif;
            # CHECK FOR EMPLYOER LOGIN
            if(isset($_SESSION['adm_uid'])):
                header("Location: empl-profile?login=".$_SESSION['token_log']);
            else:
                self::loadView('empl/signup/empl-signup');
            endif;
           
            
        }




        public static function _forget_password()
        {
            SessionModel::start_session();
            
            # CHECK FOR CANDIDATE LOGIN
            if(isset($_SESSION['sess_token'])):
                header('Location: candidate-profile?l-tk='.$_SESSION['sess_token']);
            endif;
            # CHECK FOR EMPLYOER LOGIN
            if(isset($_SESSION['adm_uid'])):
                header("Location: empl-profile?login=".$_SESSION['token_log']);
            endif;
            self::loadView('./empl/signup/forget_password');
        }
	
}


 ?>