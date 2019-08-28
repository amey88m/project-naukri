<?php include $_SERVER['DOCUMENT_ROOT'] . "/project_naukri/inc/head.inc.php" ?>

<link rel="stylesheet" href="<?php print 'sass/style.css'?>">

<?php

	# connect to db
	$db = new Db;
	$db->dbconnection();


if( isset($_POST['companySingupBtn']) ):

	$location = $_POST['location'];
	foreach($location as $key=>$val):
	endforeach;
	$location 		= mysqli_real_escape_string($db->dbconnection(), $val);
	$companyName 	= mysqli_real_escape_string($db->dbconnection(), $_POST['comname']);
	$cityName 		= mysqli_real_escape_string($db->dbconnection(), $_POST['city']);
	$hrName 		= mysqli_real_escape_string($db->dbconnection(), $_POST['hrname']);
	$hrEmail		= mysqli_real_escape_string($db->dbconnection(), $_POST['hremail']);
	
	// SESSION 
	$_SESSION['hremail'] = $hrEmail;

	// REGEX
		$reg_username 		= "/^[a-z0-9]*(\_)?()?[0-9a-z]*$/";
		$reg_client_email 	= "/^[a-z]+([0-9]*(_)?|(\.)?)?[a-z]*@[a-z]{1,9}+\.[a-z]{1,3}([\.])?([a-z]{1,2})?$/";	


			// check the empty fileds
			if(empty($location) | empty($companyName) | empty($cityName) | empty($hrName) ):
				
				echo "
					<div id='response-wrap' class='active'>
						<span class='responseError'>please fill the fileds</span>
						<span class='close'><i class='fa fa-times'></i></span>
					</div> 
				";
			else:
				// check for REGEX
				if( !preg_match($reg_client_email, $hrEmail) ):

					echo "
						<div id='response-wrap' class='active'>
							<span class='responseError'>email looks invalid</span>
							<span class='close'><i class='fa fa-times'></i></span>
						</div> 
					";		
				else:

					if( !filter_var($hrEmail, FILTER_VALIDATE_EMAIL) ):

						echo "
							<div id='response-wrap' class='active'>
								<span class='responseError'>incorrect email</span>
								<span class='close'><i class='fa fa-times'></i></span>
							</div> 
						";	
					else:
						
						header("Location: empl-signup-phone-varify.php?vm=0&loc=$location&co=$companyName&cin=$cityName&hrn=$hrName&hre=$hrEmail");
						exit();
						
					endif;
				endif;
			endif;
	
endif;


 ?>
</head>
<body>

	<div class="company_signup_wrap">
		
		<h4>sign up - For company HR. only</h4>
			<form name="company_signup_form" method="POST">
				
				<?php 
					if(!isset($_GET['vmotp'])):
						echo "
							<input type='text' name='comname' placeholder='company name' class='dis-b'>

								<select name='location[]' class='dis-b'>
									<option>mumbai</option>
									<option>other</option>
								</select>
								
								<input type='text' name='city' placeholder='other city[if any | mumbai] ' class='dis-b'>
								
								<input type='text' name='hrname' placeholder='HR Full name' class='dis-b'>
								
								<input type='email' name='hremail' placeholder='email' class='dis-b'>
								
								<input type='password' name='pass' placeholder='password' class='dis-n'>

								<input id='comp-signup-btn' type='submit' name='companySingupBtn' value='HR signup' class='company_signup_btn btn'>
						";
					else:
						
						// check for url's requests parameter 
						$mobile 	 = mysqli_real_escape_string($db->dbconnection(), $_GET['vmotp']);
						$location 	 = mysqli_real_escape_string($db->dbconnection(), $_GET['loc']);
						$company 	 = mysqli_real_escape_string($db->dbconnection(), $_GET['co']);
						$city 		 = mysqli_real_escape_string($db->dbconnection(), $_GET['ci']);
						$hr 		 = mysqli_real_escape_string($db->dbconnection(), $_GET['hr']);
						$hrEmail 	 = mysqli_real_escape_string($db->dbconnection(), $_GET['hrE']);

						
								echo "
										<input type='text' name='comname' placeholder='company name' class='dis-b' disabled value='$company'>
										<input type='text' name='$location' value='$location' disabled class='dis-b' value='$location'>
										
										<input type='text' name='city' placeholder='other city[if any]' class='dis-b' disabled value='$city'>
										<input type='text' name='hrname' placeholder='HR Full name' class='dis-b' disabled value='$hr'>
										<input type='email' name='hremail' placeholder='email' class='dis-b' disabled value='$hrEmail'>
										<input type='text' name='mobile' placeholder='10 digit mobile number' class='dis-b' disabled value='$mobile' id='login_password'>
											
											<span id='loginEye' data-show='false' class='eye loginEye'></span>
											<span id='loginEyeSlash' data-hide='true' class='eye loginEyeSlash'></span>
										<input type='password' onPaste='return false' onCopy='return false' name='password' class='dis-b logineye' placeholder='eg. test123.|test123_|test123-' id='eyeText'>
											
											<span id='loginEye' data-show='false' class='eye loginEye_2'></span>
											<span id='loginEyeSlash' data-hide='true' class='eye loginEyeSlash_2'></span>
										<input type='password' onPaste='return false' onCopy='return false' name='reenterpassword' class='dis-b logineye' placeholder='Reenter-password' >
										<input type='text' name='mobileotp' class='dis-b' placeholder='OTP'>
										<input type='submit' name='signupsuccess' class='company_signup_btn btn' value='signupsuccess'>

								";		
							
					endif;
				 ?>
				
			</form>

		<p class="terms">*user guide: 	
			<br/> step 1. First sign up with the above details. If you already signup check below step 4 link.
			<br/> step 2. verfity your mobile with OTP.
			<br/> step 3. well done you are registered now.
			<br/> step 4. <a href="empl-login" style="color:#f02">Login</a>
			<br/> step 5. You have to give access to your team for login through which next time they could able to login and start work.
			<br>
			<span style="color: #f02">Note : They can login only if you allow team member to login.</span>
		</p>
	</div>


<?php 
	

	// check otp success
	if(isset($_POST['signupsuccess'])):

		// Get url values
		$mobile 	 = mysqli_real_escape_string($db->dbconnection(), $_GET['vmotp']);
		$location 	 = mysqli_real_escape_string($db->dbconnection(), $_GET['loc']);
		$companyName = mysqli_real_escape_string($db->dbconnection(), $_GET['co']);
		$city 		 = mysqli_real_escape_string($db->dbconnection(), $_GET['ci']);
		$hr 		 = mysqli_real_escape_string($db->dbconnection(), $_GET['hr']);
		$hrEmail 	 = mysqli_real_escape_string($db->dbconnection(), $_GET['hrE']);

		$pass 		 = mysqli_real_escape_string($db->dbconnection(), $_POST['password']);
		$reTypePass  = mysqli_real_escape_string($db->dbconnection(), $_POST['reenterpassword']);
		$otpmobile 	 = mysqli_real_escape_string($db->dbconnection(), $_POST['mobileotp']);

		$reg_pass = "/^[a-z0-9]+[_.-]$/";
		$reg_client_email 	= "/^[a-z]+([0-9]*(_)?|(\.)?)?[a-z]*@[a-z]{1,9}+\.[a-z]{1,3}([\.])?([a-z]{1,2})?$/";
		// check for all url input's

		if( empty($mobile) | empty($location) | empty($companyName) | empty($city) | empty($hr) | empty($hrEmail) | !preg_match($reg_client_email, $hrEmail) | (strlen($mobile) > 10 | strlen($mobile) < 10) ):
			header('Location: empl-signup.php?signup=falied');
			exit();
		else:
			// check for password 
			if( empty($pass) | empty($reTypePass) ):
				echo "
					<div id='response-wrap' class='active'>
						<span class='responseError'>your password is empty</span>
						<span class='close'><i class='fa fa-close'></i></span>
					</div> 
				";
			else: 
				// check for password length
				if( strlen($pass) < 8 ):
					echo "
					<div id='response-wrap' class='active'>
						<span class='responseError'>password is week. min 8 char password required.</span>
							<span class='close'><i class='fa fa-times'></i></span>
						</div> 
					";
				else:
					// check for password REGEX
					if(!preg_match($reg_pass, $pass)):
						echo "
							<div id='response-wrap' class='active'>
								<span class='responseError'> use any one of this 3 special char (_ . -)</span>
								<span class='close'><i class='fa fa-times'></i></span>
							</div> 
						";
					else:
						// check for password === retype password
						if( $pass !== $reTypePass ):
							echo "
								<div id='response-wrap' class='active'>
									<span class='responseError'>password are not matched. Please type again.</span>
									<span class='close'><i class='fa fa-times'></i></span>
								</div> 
							";
						else:
							// verfiy OTP							
							if( empty($_POST['mobileotp']) ):
								echo "
									<div id='response-wrap' class='active'>
										<span class='responseError'>check your mobile $mobile and please fill the OTP.</span>
										<span class='close'><i class='fa fa-times'></i></span>
									</div> 
								";
								else:
									if( $_COOKIE['otpmobile'] !== $_POST['mobileotp'] ):
										echo "
											<div id='response-wrap' class='active'>
												<span class='responseError'> Hey! you entered wrong otp.</span>
												<span class='close'><i class='fa fa-times'></i></span>
											</div> 
										";	
									else:
										// user exit on database
										$sql 			= "select compId from companysignup where compHREmail='$hrEmail' limit 1";
										$query 			= $db->numRows($sql);
										$rowscount		= mysqli_num_rows($query);
											
										if($rowscount > 0):
											$rows = $db->sql($sql);
											foreach( $rows as $value ):
											endforeach;
											echo "
												<div id='response-wrap' class='active'>
													<span class='responseError'> Hi! $mobile you have already registered with us.please</span>
													<a href='empl-login.php?emphrid=".$value['compId']."'>Login?</a> from here.
													<span class='close'><i class='fa fa-times'></i></span>
												</div> 
											";
										else:
											// check for ip
											$_compsclientIp = $_SERVER['REMOTE_ADDR'];
											$compsclientIp  = filter_var($_compsclientIp, FILTER_VALIDATE_IP);
											
											// ip - obfucate 
											$bin2hex_ip   	= bin2hex($compsclientIp);
											$encode_ip 		= base64_encode($bin2hex_ip);

											// obfucate - ip
											$decode 	= base64_decode($encode_ip);
											$hex2bin    = hex2bin($decode);
											
											// CREATE TOKEN 
											// PRIVATE TOKEN & PUBLIC 
											// USE THIS TOKEN TO API INTEGRATION
											$_priv_tok = uniqid('', true).time()."EWOE1284401FLSD9381947582XRHZQPODU";
											$_SESSION['_private_token']  = $_priv_tok;
											$_SESSION['_user_reg_id']    = uniqid().time();
											// send to database
$resultRow = $db->numRows("INSERT INTO companysignup(compName,compLocation,compHRName,compHREmail,compHRPass,compHRPhone,cofirmHRPhone,signupDate,compsclientIp,regtoken) 
VALUES('$companyName','$location','$hr','$hrEmail','$pass','$mobile','1',NOW(),'$encode_ip','{$_SESSION['_private_token']}') ");

mysqli_query($db->dbconnection(), $resultRow);
											setcookie('otpmobile','');
											header("Location: empl-login?emplSignup=success");
											exit();
										endif;
									endif;
							endif;
						endif;
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