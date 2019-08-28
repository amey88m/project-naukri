<?php 
// (!isset($_SERVER['HTTP_REFERER']))? header("Location: empl-login.php?error=page not found"):"" ;

session_save_path($_SERVER['DOCUMENT_ROOT'] . '/project_naukri/' . '/session/');
session_start();
session_start();

include $_SERVER['DOCUMENT_ROOT'] . "/project_naukri/inc/head.inc.php";


?>

<link rel="stylesheet" href="<?php print 'sass/style.css' ?>">


			<form name="company_reset_password" method="POST" autocomplete >
				<?php 
					if( isset($_GET['rstpass'])):	

						echo "
								<input type='email' name='email' class='dis-b' placeholder='email' disabled value='".$_SESSION['hremail']."' onPaste='return false' onCopy='return false' >
									<span id='loginEye' data-show='false' class='eye loginEye'></span>
									<span id='loginEyeSlash' data-hide='true' class='eye loginEyeSlash'></span>
								<input type='password' onPaste='return false' onCopy='return false' name='nwpassword' class='dis-b logineye' placeholder='new password' id='eyeText'>
									
									<span id='loginEye' data-show='false' class='eye loginEye_2'></span>
									<span id='loginEyeSlash' data-hide='true' class='eye loginEyeSlash_2'></span>
								<input type='password' onPaste='return false' onCopy='return false' name='nwreenterpassword' class='dis-b logineye' placeholder='Re-Enter new password' >

								<input type='submit' class='btn reset_my_password' name='setNewPassword' value='reset Now'>
						";
					endif;
				?>
			</form>	



<script src="app/jquery-1.11.1.js"></script>
<script src="app/error_e_module.js"></script>
<script src="app/app.js"></script>
<script src="app/ico_module.js"></script>
</body>
</html>
