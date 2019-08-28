<?php include $_SERVER['DOCUMENT_ROOT'] . "/project_naukri/inc/head.inc.php" ?>
<link rel="stylesheet" href="<?php print 'sass/style.css' ?>">
</head>
<body>
<?php 

// RESET PASSWORD PAGE
// 1. CHECK USER EMAIL IS REGISTER OR NOT REGISTERED.
// 
if( isset($_POST['resetMyPassBtn'])):
	
		$db = new Db;
		$db->dbconnection();

	// escape strings
	$resetpageEmail = mysqli_real_escape_string($db->dbconnection(), $_POST['resetPassonEmail']);
	// SET SESSION
	$_SESSION['resetPassonEmail'] = $resetpageEmail;
	// CHECK THE EMAIL PROVIDED BY USER IS REGISTER WITH US 
	// IF YES => RESET PASSWORD
	// IF NO => REDIRECT USER PAGE TO REGISTER
	$query = $db->numRows("select compId from companysignup where compHREmail='$resetpageEmail' LIMIT 1");// SET IP= IPADDRESS TEMP I SET IT AS 0
	$countRows = mysqli_num_rows($query);

	if( $countRows > 0):
		// YOU CAN RESET PASSWORD
		echo "
				<div id='response-wrap' class='active'>
					<span class='responseError'>Email Id is registered. We are redirecting you to reset password.</span>
					<span class='close'><i class='fa fa-times'></i></span>
				</div> 
			";	
		sleep(2);
		header("Location: forget_password?rstpass=1");
		exit();
	else:
		// 1st REGISTER 
		echo "
				<div id='response-wrap' class='active'>
					<span class='responseError'>oops! Are you not registered yet? Please register from here.</span>
					<span class='close'><i class='fa fa-times'></i></span>
					<a class='btn RgNowBtn' href='empl-signup'>register now</a>
				</div> 
			";		
	endif;
endif;
?>

	<div class="company_login_wrap">

		<h4>Reset Password.</h4>
			<form name="company_reset_password" method="POST" autocomplete >
				<?php 
					if(empty($_GET['fp']) ):
					endif;
					if( isset($_GET['fp']) ):
						echo "
							<input type='email' name='resetPassonEmail' class='dis-b' placeholder='email'>
							<input type='submit' name='resetMyPassBtn' class='btn company_reset_password_btn' value='RESET PASSWORD' >
						";						
					endif;
										
					if( isset($_GET['rstpass'])):
						
						$rstpass = $_GET['rstpass'];
						
							echo "
								<input type='email' name='email' class='dis-b' placeholder='email' disabled value='".$_SESSION['resetPassonEmail']."'>
									<span id='loginEye' data-show='false' class='eye loginEye'></span>
									<span id='loginEyeSlash' data-hide='true' class='eye loginEyeSlash'></span>
								<input type='password' onPaste='return false' onCopy='return false' name='newSetPassword' class='dis-b logineye' placeholder='Set new password' id='eyeText'>
									
									<span id='loginEye' data-show='false' class='eye loginEye_2'></span>
									<span id='loginEyeSlash' data-hide='true' class='eye loginEyeSlash_2'></span>
								<input type='password' onPaste='return false' onCopy='return false' name='newReEnterPassword' class='dis-b logineye' placeholder='Re-Enter new password' >

								<input type='submit' class='btn reset_my_password' name='setNewPasswordSuccessBtn' value='reset Now'>
							";
					endif;
				 ?>	
			</form>
	</div>

<?php 

if( isset($_POST['setNewPasswordSuccessBtn']) && isset($_GET['rstpass']) ):

	$db = new Db;
	$db->dbconnection();

	// ESCAPE VALUES
	
	$emailId  		= mysqli_real_escape_string($db->dbconnection(), $_SESSION['resetPassonEmail']);
	$newpass 		= mysqli_real_escape_string($db->dbconnection(), $_POST['newSetPassword']);
	$reenterpass 	= mysqli_real_escape_string($db->dbconnection(), $_POST['newReEnterPassword']);

		// CHECK FOR EMPTY FILEDS
		if( empty($_SESSION['resetPassonEmail']) | empty($newpass) | empty($reenterpass)):
			echo "
				<div id='response-wrap' class='active'>
					<span class='responseError'>oops! Fields are empty. or you can visit to register page, just click to button.</span>
					<span class='close'><i class='fa fa-times'></i></span>
					<a class='btn RgNowBtn' href='empl-signup'>register now</a>
				</div> 
			";	
		else:
			// CHECK REGEX PASSWORD
			//	NEW REGEX SET
			$reg_pass = "/^[a-z0-9]+(\.|\_|-)?[a-z0-9]+$/"; 
				if( !preg_match($reg_pass, $newpass)):
					echo "
							<div id='response-wrap' class='active'>
								<span class='responseError'> you have to use one special char (_ . -) and 1 digit.</span>
								<span class='close'><i class='fa fa-times'></i></span>
							</div> 
						";
				else:
					// CHECK PASSWORD LENGTH MIN-6 (DEFAULT LENGTH 8)
					if( strlen($newpass) < 6 || strlen( $reenterpass) < 6 ):
						echo "
							<div id='response-wrap' class='active'>
								<span class='responseError'>password is week. min 6 char password required.</span>
									<span class='close'><i class='fa fa-times'></i></span>
								</div> 
							";
					else:
						// CHECK FOR BOTH PASS == PASS
						if( $newpass !== $reenterpass):
							echo "
								<div id='response-wrap' class='active'>
									<span class='responseError'>password dones not matched.</span>
										<span class='close'><i class='fa fa-times'></i></span>
									</div> 
								";	
						else:
							// UPDATE PASSWORD TO NEW PASSWORD
							$db->numRows("UPDATE companysignup SET compHRPass='$newpass' WHERE compHREmail='$emailId' ");
							echo "
									<div id='response-wrap' class='active'>
										<span class='responseError'>password set successfully.</span>
										<span class='close'><i class='fa fa-times'></i></span>
									</div> 
								";
							header("Location: empl-login?restP=true");
							exit();	
						endif;
					endif;
				endif;
		endif;
endif;
 ?>

<script src="app/jquery-1.11.1.js"></script>
<script src="app/error_e_module.js"></script>
<script src="app/app.js"></script>
<script src="app/ico_module.js"></script>
</body>
</html>