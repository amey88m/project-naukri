<?php

class HrSignupFormcontroller extends Controller {


    
        public static function _signup_form()
        {
            
                SessionModel::start_session();
                error_reporting(0);


                
#               print $_GET['link-hrrg-token'] . "<br>" . $_GET['link-hrrg-id'] . "<br>". $_GET['bytok'] . "<br>" . $_GET['bytokn'] . "<br>" . $_GET['bytoke'] . "<br>" . $_GET['id'];
                # RULE`S CONNTECT WITH COMPANY HR: 
                # ($_SESSION['_private_token'] == $_GET['bytok'])
                # ($_GET['id'] == $_SESSION['compid'])
                
                if(isset($_GET['bytok']) && !empty($_GET['bytok']) 
                    && ($_SESSION['_private_token'] == $_GET['bytok']) 
                    && isset($_GET['link-hrrg-token']) && !empty($_GET['link-hrrg-token']) && isset($_GET['link-hrrg-id']) 
                    && !empty($_GET['link-hrrg-id']) && isset($_GET['id']) && !empty($_GET['id']) 
                    && ($_GET['id'] == $_SESSION['compid']) ):
                    # generate session
                    $_SESSION['comp_id'] = $_GET['id'];
                    self::loadModel('hr/HrSignupFormValidation');
                    self::loadView('./empl/Admin/hr-signup-form');
                    exit;
                else:
                    self::loadView('errors/401');
                    exit;
                endif;
                
                
        }


        public static function _signup_form_validation()
        {
            // error_reporting(0);
            ## 
            self::loadModel('hr/HrSignupFormValidation');
            HrSignupFormValidation::_hr_signup_form_validate();
            
        }


        public static function _send_email_to_hr()
        {
            
            self::loadModel('SessionModel');
            self::loadModel('email/Email');
            self::loadModel('email/SendHREmail');
            
        }


}


