<?php 

class HrActivitiescontroller extends Controller {




                public static function _todo()
                {
                    
                    if($_GET['list'] == '1'):
                        self::loadModel('hr/HrActivities');
                        HrActivities::_todo_list();
                    endif;
                }




                public static function _candidate_application_recevied() 
                {
                    HrActivities::_candidate_application_recevied();
                }



                public static function _eod()
                {
                    
                    # CHECK FOR TOKEN #
                    if(isset($_COOKIE['_20']) && ($_COOKIE['_20'] == $_POST['tok']) ):
                        SessionModel::start_session();
                        self::loadModel('hr/HrActivities');
                        self::loadModel('email/Email');
                        HrActivities::_sendEod();
                    else:
                        exit;
                    endif;

                }


                public static function _tracker()
                {
                    # save record into json file #
                    if($_SERVER['REQUEST_METHOD'] == 'POST'):
                        # CHECK TOKEN #
                        if(isset($_COOKIE['_20']) && ($_COOKIE['_20'] == $_POST['token']) 
                        && $_SERVER['REDIRECT_STATUS'] = 200 && ($_SERVER['HTTP_TOKEN'] == $_POST['token']) 
                        && ($_SERVER['HTTP_TOKEN'] == $_COOKIE['_20']) && $_SERVER['REQUEST_METHOD'] == 'POST'
                        && $_SERVER['REQUEST_SCHEME'] == 'http' && $_SERVER['REMOTE_ADDR'] == '127.0.0.1' ):
                            SessionModel::start_session();
                            self::loadModel('hr/HrActivities');
                            HrActivities::_save_tracker_to_json_file();
                        else:
                            exit;
                        endif;
                    # show saved record from json file #
                    elseif($_SERVER['REQUEST_METHOD'] == 'GET' && $_COOKIE['_20'] == $_GET['token']
                            && $_SERVER['HTTP_TOKEN'] == $_COOKIE['_20']):
                        SessionModel::start_session();
                        self::loadModel('hr/HrActivities');
                        HrActivities::show_save_tracker_to_json_file();
                    else:
                        exit;
                    endif;

                }



                public function _lineup()
                {
                    HrActivities::_lineup();
                }

                public function _pipeline()
                {
                    HrActivities::_pipeline();
                }
                
                public function _joined()
                {
                    HrActivities::_joined();
                }
                
                public function _job_opened()
                {
                    HrActivities::_job_opened();
                }

                public function _job_closed()
                {
                    HrActivities::_job_closed();
                }

                


}