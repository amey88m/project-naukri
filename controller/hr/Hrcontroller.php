<?php
class Hrcontroller extends Controller {




            public static function _login()
            {
                error_reporting(0);
                SessionModel::start_session();

                if( ($_SESSION['compid'] == $_GET['_id']) && !empty($_GET['_id']) 
                    && isset($_GET['_id']) && isset($_GET['_hr_reg_token']) 
                    && !empty($_GET['_hr_reg_token']) ):
                    # CHECK FOR  HR LOGIN TOKEN
                    if($_GET['_pvt_co_tok'] == $_SESSION['_private_token']): 
                        # hr login page
                        self::loadView('hr/hr-login');
                        self::_login_check();
                        exit;
                    else:
                        self::loadError('401');
                        exit;  
                    endif;
                else:
                    self::loadError('401');
                    exit;
                endif;
                
                
            }




            
            public static function _login_check()
            {
                // SessionModel::start_session();
                SessionModel::_log_session_hr();
                # CHECK FOR HR LOGIN
                if(isset($_POST['_hrLoginBtn']) && !empty($_POST['_hrLoginBtn'])):
                    self::loadModel('hr/HrLogin');
                    hrLogin::_hrlogin();
                    exit;
                else:
                    exit;
                endif;
            }



            

            public static function _login_success()
            {
                error_reporting(0);
                SessionModel::_out_session_hr();
                
                if(!isset($_GET['_81894']) && empty($_GET['_is']) 
                && !isset($_GET['_20_15_11_5_14']) 
                && !isset($_GET['_tok'])):
                    self::loadError('401');
                    exit;
                else:
                    if(!empty($_COOKIE['8_18_9_4']) && ($_SESSION['_HR_ID'] == $_GET['_81894']) 
                    && isset($_SESSION['_HR_PRIVATE_TOKEN']) && !empty($_SESSION['_HR_PRIVATE_TOKEN'])
                    && ($_SESSION['_HR_PRIVATE_TOKEN'] == $_GET['_tok'])
                    && isset($_SESSION['_private_token']) && !empty($_SESSION['_private_token']) && !empty($_GET['_is'])):
                        # load `hr login success`
                        $token = openssl_random_pseudo_bytes(23).uniqid(true);
                        $token = bin2hex($token);
                        setcookie('_20', $token, 0);
                        self::loadView('hr/Admin/index');
                        exit;
                    else:
                        self::loadError('401');
                        exit;
                    endif;
                endif;
            }

}