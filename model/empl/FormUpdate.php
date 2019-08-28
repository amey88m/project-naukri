<?php 

SessionModel::start_session();
FormUpdate::update_form();



class FormUpdate
{

	
	public static $err_msg 	= "<br/> <div class='alert alert-danger' role='alert'>empty field.</div>";
	public static $msg 		= "<br/> <div class='alert alert-success' role='alert'>data updated successfully.</div>";






		public static function update_form()
		{


			// check for security
			if( $_SESSION['token_log'] == $_COOKIE['tkl']):

						$db = new Db;
						$db->dbconnection();	

					// check my hrname
					if(isset($_POST['checkbox-hrname'])):
						
						$hrname 	 = mysqli_real_escape_string($db->dbconnection(), $_POST['hrname']);
						if(empty($hrname)):
							print self::$err_msg;
							exit();
						else:
							print self::$msg;
							$sql = "UPDATE companysignup SET compHRName='$hrname' WHERE compId='{$_SESSION['compid']}'";
							$db->numRows($sql);
							exit();
						endif;
					endif;

					// check my hremail
					if(isset($_POST['checkbox-hremail'])):
						$hremail 	 = mysqli_real_escape_string($db->dbconnection(), $_POST['hremail']);
						if(empty($hremail)):
							print self::$err_msg;
							exit();
						else:
							print self::$msg;
							$sql = "UPDATE companysignup SET compHREmail='$hremail' WHERE compId='{$_SESSION['compid']}'";
							$db->numRows($sql);
							exit();
						endif;
					endif;

					// check my location
					if(isset($_POST['checkbox-companyloc'])):
						$loc		 = mysqli_real_escape_string($db->dbconnection(), $_POST['companyLocation']);
						if(empty($loc)):
							print self::$err_msg;
							exit();
						else:
							print self::$msg;
							$sql = "UPDATE companysignup SET compLocation='$loc' WHERE compId='{$_SESSION['compid']}' ";
							$db->numRows($sql);
							exit();
						endif;
					endif;

					// check my designation
					if(isset($_POST['checkbox-hrdesig'])):
						$designation = mysqli_real_escape_string($db->dbconnection(), $_POST['hrdesignation']);
						if(empty($designation)):
							print self::$err_msg;
							exit();
						else:
							print self::$msg;
							$sql = "UPDATE companysignup SET Designation='$designation' WHERE compId='{$_SESSION['compid']}' ";
							$db->numRows($sql);
							exit();	
						endif;
						
					endif;

					// check my phone number
					if(isset($_POST['checkbox-hrphone'])):
						$phone = mysqli_real_escape_string($db->dbconnection(), $_POST['hrphone']);
						if(empty($phone)):
							print self::$err_msg;
							exit();
						else:
							print self::$msg;
							$sql = "UPDATE companysignup SET compHRPhone='$phone' WHERE compId='{$_SESSION['compid']}' ";
							$db->numRows($sql);
							exit();	
						endif;
					endif;

			endif;
			mysqli_close($db->dbconnection());
		
		}		

	
}





 ?>