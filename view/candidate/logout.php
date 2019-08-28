<?php 
session_save_path($_SERVER['DOCUMENT_ROOT'] . '/project_naukri/' . '/session/');
session_start();
session_id();

if(!isset($_SESSION['sess_uid'])):
	header("Location: login");
	exit();
endif;

$_SESSION['c_login_sess'] = " ";
$_SESSION['sess_email']   = " ";
$_SESSION['sess_token']   = " ";
$_SESSION['sess_uid']	  = " ";
$_SESSION['canId']  	  = " ";
setcookie('clsc','');

$_SESSION['hr_reg_token'] = " ";
$_SESSION['resN'] =  " ";
$_SESSION['resE'] = " ";
$_SESSION['registered_email_Token'] = " ";
$_SESSION['reset_password_link_token_'] = " ";

session_unset();


 ?>