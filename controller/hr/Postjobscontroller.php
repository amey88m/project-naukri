<?php 
class Postjobscontroller extends Controller {





        public static function job_posted()
        {

            SessionModel::start_session();
            
            # CHECK FOR TOKEN
            if( ($_COOKIE['_20'] == $_POST['tok']) && ($_COOKIE['_20'] == $_SERVER['HTTP_TOKEN'])
                && $_SERVER['HTTP_ORIGIN'] == 'http://127.0.0.1'
                && $_SERVER['HTTP_HOST'] == '127.0.0.1'
                && $_SERVER['GATEWAY_INTERFACE'] = 'CGI/1.1' 
                && $_SERVER['REQUEST_METHOD'] = 'POST'):
                self::loadModel('hr/HrActivities');
                HrActivities::post_jobs();
                exit;
            else:
                self::loadError('401');
                exit;
            endif;
           
        }


        # check for `is hr is looking to post a repeted job?` @@@@
        public static function _check()
        {

            SessionModel::start_session();

            # check for token @@@
            if( ($_COOKIE['_20'] == $_POST['tok']) && ($_COOKIE['_20'] == $_SERVER['HTTP_TOKEN'])
                && $_SERVER['HTTP_ORIGIN'] == 'http://127.0.0.1'
                && $_SERVER['HTTP_HOST'] == '127.0.0.1'
                && $_SERVER['GATEWAY_INTERFACE'] = 'CGI/1.1' 
                && $_SERVER['REQUEST_METHOD'] = 'POST'):

                # check for btn values @@@
                if($_POST['value'] == "No"):
                    exit;
                elseif($_POST['value'] == "Yes"):
                    self::loadModel('hr/HrActivities');
                    HrActivities::yes();
                    exit;
                endif;

            else:
                self::loadError('401');
                exit;
            endif;
            
        }

}