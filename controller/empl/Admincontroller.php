<?php


class Admincontroller extends Controller
{


        public static function _admin_index()
        {
            SessionModel::start_session();
            if(!isset($_SESSION['adm_uid']) || !isset($_SESSION['token_log']) || !isset($_GET['login']) || empty($_GET['login'])):
                $_SESSION['failed'] = 0;
                header("location: empl-login?login=".$_SESSION['failed']);
                setcookie('tkl','');
            else:
                self::loadView('./empl/Admin/index');
            endif;
        }

        public static function _admin_login()
        {
            SessionModel::start_session();
            if(!isset($_SESSION['adm_uid']) || !isset($_SESSION['token_log']) || !isset($_GET['login']) || empty($_GET['login'])):
                $_SESSION['failed'] = 0;
                header("location: empl-login?login=".$_SESSION['failed']);
                setcookie('tkl','');
            else:
                self::loadView('./empl/Admin/profile');
            endif;
        
            
        }

        public static function _admin_hr_form()
        {

            SessionModel::start_session();
            if(!isset($_SESSION['adm_uid']) || !isset($_SESSION['token_log'])):
                $_SESSION['failed'] = 0;
                header("location: empl-login?login=".$_SESSION['failed']);
                setcookie('tkl','');
            else:
                self::loadView('./empl/Admin/hr_form');
            endif;

        }

        public static function _admin_chart()
        {
            SessionModel::start_session();
            
            if(!isset($_SESSION['adm_uid']) || !isset($_SESSION['token_log']) ):
                $_SESSION['failed'] = 0;
                header("location: empl-login?login=".$_SESSION['failed']);
                setcookie('tkl','');
            else:
                self::loadView('./empl/Admin/chart-chartjs');
            endif;

            
        }

        public static function _admin_team()
        {
            SessionModel::start_session();
            if(!isset($_SESSION['adm_uid']) || !isset($_SESSION['token_log']) ):
                $_SESSION['failed'] = 0;
                header("location: empl-login?login=".$_SESSION['failed']);
                setcookie('tkl','');
            else:
                self::loadView('./empl/Admin/team_eye');
            endif;
        }


        public static function _admin_form()
        {
            // SessionModel::start_session();
            // if(!isset($_SESSION['adm_uid']) || !isset($_SESSION['token_log']) || !isset($_GET['login']) || empty($_GET['login'])):
            //     $_SESSION['failed'] = 0;
            //     header("location: empl-login?login=".$_SESSION['failed']);
            //     setcookie('tkl','');
            // else:
                
            // endif;
            self::loadModel('./empl/FormUpdate');

        }

        
        public static function _admin_form_update()
        {
            self::loadModel('./empl/FormUpdate');
            // self::_admin_form();
        }

        public static function _admin_logout()
        {
            self::loadView('./empl/Admin/logout');
        }

        public static function _hr_logout()
        {
            self::loadView('./hr/Admin/logout');
        }

        

}