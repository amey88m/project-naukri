<?php 
SessionModel::start_session();
$_SESSION['compid']   	= " ";
$_SESSION['compname'] 	= " ";
$_SESSION['loc'] 	  	= " ";
$_SESSION['hrname']   	= " ";
$_SESSION['phone']		= " ";
$_SESSION['hremail']  	= " ";
$_SESSION['signupdate'] = " ";
$_SESSION['aduid']      = " ";
session_unset();
setcookie('tkl','');
$_SESSION['logout'] = 1;
header("Location: empl-login?logout=".$_SESSION['logout']);
exit();
 ?>