<?php 

include $_SERVER['DOCUMENT_ROOT'] . "/project_naukri/inc/head.inc.php";

(!isset($_SERVER['HTTP_REFERER']))? header("Location: empl-signup.php?register=failed"):"";
?>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css">
<link rel="stylesheet" href="sass/style.css" >


<?php 
	if(isset($_GET['vm'])):

		// include root."classes/Db.php";

		// connect with db
		$db = new Db;
		$db->dbconnection();

		// Get the url values
		$loc 	 = mysqli_real_escape_string($db->dbconnection(), $_GET['loc']);
		$com 	 = mysqli_real_escape_string($db->dbconnection(), $_GET['co']);
		$city 	 = mysqli_real_escape_string($db->dbconnection(), $_GET['cin']);
		$hrName  = mysqli_real_escape_string($db->dbconnection(), $_GET['hrn']);
		$hrEmail = mysqli_real_escape_string($db->dbconnection(), $_GET['hre']);

		// otp send
		if(isset($_POST['sendotp'])):
			$mobile = mysqli_real_escape_string($db->dbconnection(), $_POST['mobile']);					
			$reg_mobile = "/^[0-9]{10}$/"; // REGEX 

			// check empty filed
			if(empty($mobile)):
				echo "
					<div id='response-wrap' class='active'>
						<span class='responseError'>please fill the fileds</span>
						<span class='close'><i class='fa fa-times'></i></span>
					</div> 
				";
			else:
				// check the mobile digit
				if( strlen($mobile) > 10 | strlen($mobile) < 10):
					echo "
						<div id='response-wrap' class='active'>
							<span class='responseError'>mobile number is not valid.</span>
							<span class='close'><i class='fa fa-times'></i></span>
						</div> 
					";
				else:
					// check REGEX
					if( !preg_match($reg_mobile, $mobile)):
						echo "
							<div id='response-wrap' class='active'>
								<span class='responseError'>invalid mobile number.</span>
								<span class='close'><i class='fa fa-times'></i></span>
							</div> 
						";	
					else:
						// OTP
						$str = "TXTLOCAL";
						$str = str_shuffle($str);
						$str = substr($str, 0,2);
						$num = mt_rand(9999 , 99999); 
						$gen_otp =  $num.$str;
						
						setcookie('otpmobile', $gen_otp, 0 ,root."/cookies"); // set cookie for one min

						$username = "amey88_m@yahoo.com";
						$hash = "cf5710ca147dd48192ed70641599596ccad19c4dad11cf89efb1274c768aee45";

						$test = "0";
						
						$sender = "TXTLCL"; // This is who the message appears to be from.
						$numbers = $mobile; // A single number or a comma-seperated list of numbers
						$message = "Thank you $hr! check <br/>
									your password : $pass <br/>
									your reEnterpassword : $reTypePass <br/>
									and please verify your mobile number. <br/>
									Your <b>OTP</b> is: ". $gen_otp;
						
						$message = urlencode($message);
						$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
						$ch = curl_init('http://api.textlocal.in/send/?');
						curl_setopt($ch, CURLOPT_POST, true);
						curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						$result = curl_exec($ch); // This is the result from the API
						curl_close($ch);
						header("Location: empl-signup?vmotp=$mobile&loc=$loc&co=$com&ci=$city&hr=$hrName&hrE=$hrEmail");
					endif;
				endif;
			endif;
		endif;
	else:
		header("Location: empl-signup-phone-varify?error=403");
		exit();
	endif;

 ?>
</head>
<body>


<div class="company_signup_wrap">
	<h4>Good! You almost done. Please varify your mobile.</h4>
	<form method="POST" >
		<input type="text" name="mobile" placeholder="10 digit mobile number" class="dis-b">
		<input type="submit" value="send OTP" name="sendotp" class="send_otp_btn btn">
	</form>
	<p class="terms">*user guide: 	
		<br/> step 1. First sign up with the above details 
		<br/> step 2. verfity your mobile with OTP.
		<br/> step 3. well done you are registered now.
		<br/> step 4. Login.
		<br/> step 5. You have to give access to your team for login. 
		Note : They can login only if you allow team member to login.
	</p>
</div>

<script src="app/jquery-1.11.1.js"></script>
<script src="app/error_e_module.js"></script>
<script src="app/app.js"></script>
</body>
</html>	