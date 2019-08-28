<?php 



class EmplLogModel extends Model
{
	
    public static function _emp_login()
    {
        if(isset($_POST['login'])):

            // connect with db
            $db = new Db;
            $db->dbconnection();
            //  escape string to prevent sql injection
            $email 	= mysqli_real_escape_string($db->dbconnection(), $_POST['email']);
            $pass 	= mysqli_real_escape_string($db->dbconnection(), $_POST['password']);

            $email = trim($email);
            $pass  = trim($pass);
                
            $_SESSION['success'] 	 = 1;
            $_SESSION['failed']  	 = 0;
                    
            // sql query
            $query = $db->numRows("SELECT compId FROM companysignup WHERE compHREmail='$email' AND compHRPass='$pass' LIMIT 1");
            $rowscount = mysqli_num_rows($query);

            // check user is registerd
            if( $rowscount === 0):
                header("Location: empl-login?login=".$_SESSION['failed'] );
                exit();
            else:
                $sql = "SELECT compId,compName,compLocation,compHRName,compHREmail,compHRPhone,signupDate FROM companysignup WHERE compHREmail='$email' AND compHRPass='$pass' LIMIT 1";
                $result  = $db->sql($sql);
                if(is_array($result)):
                    foreach($result as $key=>$val):
                    endforeach;
                endif;
                // session_regenerate_id(true);
                $_SESSION['compid']   	= $val['compId'];
                $_SESSION['compname'] 	= $val['compName'];
                $_SESSION['loc'] 	  	= $val['compLocation'];
                $_SESSION['hrname']   	= $val['compHRName'];
                $_SESSION['phone']		= $val['compHRPhone'];
                $_SESSION['hremail']  	= $val['compHREmail'];
                $_SESSION['signupdate'] = $val['signupDate'];
                $_SESSION['login_time'] = time();
                $_SESSION['adm_uid']   	= uniqid().time();
                $_tok = openssl_random_pseudo_bytes(23);
                $_SESSION["_private_token"] = bin2hex($_tok);
                

                // USE THIS TOKEN TO AUTHENTICATION
                $_SESSION['token_log'] 	= mt_getrandmax().time().uniqid();
                header("Location: empl-profile?login=".$_SESSION['token_log']);
                exit();
            endif;
        endif;
    }
    
	
}
 ?>