<?php
class HrLogin extends Model {

    
    private static $connection;
    public static $_hr_error_handler = 0;




        public static function _hrlogin()
        {
 
            # 
            $db = new Db;
            self::$connection = $db->dbconnection();
            
            # ESCAPE STRING 
            $_hr_useremail = mysqli_real_escape_string(self::$connection,  trim($_POST['useremail']));
            $_hr_userpassword = mysqli_real_escape_string(self::$connection, trim($_POST['pass']));
            # ESCAPE HTML TAGE`S
            $_hr_useremail      = filter_var($_hr_useremail, FILTER_SANITIZE_STRING);
            $_hr_userpassword   = filter_var($_hr_userpassword, FILTER_SANITIZE_STRING);
            
            
            if(empty($_hr_useremail)):
                self::$_hr_error_handler  = 1;
                print Hrcontroller::loadError('_hr-errorHandler');
            else:
                if(empty($_hr_userpassword)):
                    self::$_hr_error_handler = 2;
                    print Hrcontroller::loadError('_hr-errorHandler');
                else:

                # CHECK `IF HR SIGNUP` TOKEN
                $q = "SELECT HRId,IsValidEmail,hr_rg_token,HRName,HREmail FROM hrlogin WHERE HREmail='$_hr_useremail' AND HRPass='$_hr_userpassword' AND IsValidEmail='1' LIMIT 1";
                
                $result = $db->numRows($q);
                $rowscount = mysqli_num_rows($result);
                
                if(empty($rowscount)):
                    self::$_hr_error_handler  = 3;
                    print Hrcontroller::loadError('_hr-errorHandler');
                    exit;
                endif;
                
                    # `hr authorized user`, so they can login successfully.
                    # CREATE _private_token , token, id,
                    # 
                    $rs = $db->sql($q);
                    foreach($rs as $r):
                    endforeach;
                    $_SESSION['isemailvalide']  = $r["IsValidEmail"];
                    # _81894 > hrid
                    # _is > email valide
                    # _20_15_11_5_14 > token
                    # _Rgtok > hr signup token
                    #   
                    $_SESSION['_HR_PRIVATE_TOKEN'] = bin2hex(openssl_random_pseudo_bytes(12)).uniqid('',true);
                    $_SESSION['_HR_TOK'] = uniqid();
                    $_SESSION['_HR_ID'] = $r['HRId'];
                    $_SESSION['_HR_Rg_TOKEN'] = $r['hr_rg_token'];
                    setcookie('8_18_9_4', $r['HRId'], 0);
                    $_SESSION['_HR_NAME'] = $r['HRName'];
                    $_SESSION['_HR_EMAIL'] = $r['HREmail'];
header("location: hr-login-admin?_81894={$_SESSION['_HR_ID']}&_is={$_SESSION['isemailvalide']}&_20_15_11_5_14={$_SESSION['_HR_TOK']}&_tok={$_SESSION['_HR_PRIVATE_TOKEN']}");
                    endif;
                endif;

        }

}