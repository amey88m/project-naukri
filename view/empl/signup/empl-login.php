<?php include $_SERVER['DOCUMENT_ROOT'] . "/project_naukri/inc/head.inc.php" ?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="sass/style.css" >


</head>
<body>
<?php 
	if(isset($_GET['emphrid'])):
		$_SESSION['empId'] = $_GET['emphrid'];
	endif; 
?>
	<div class="company_login_wrap">
		<h4>Login</h4>
			<form name="company_login_form" method="POST" autocomplete >
				<input type="email" name="email" class="dis-b" placeholder="email">
					<span id='loginEye' data-show='false' class='eye loginEye'></span>
					<span id='loginEyeSlash' data-hide='true' class='eye loginEyeSlash'></span>
				<input type="password" name="password" class="dis-b" placeholder="password">	
				<a href="forget_password?fp=<?php echo $_SESSION['empId']; ?>" class="forget_pass" name="forgetpass">forget password?</a>
				<input type="submit" name="login" class="btn company_login_btn" value="LOGIN" target="_self">
			</form>
	</div>

<?php	
		if( empty($_SESSION['empId']) ):
			$_SESSION['empId']=0;
		endif; 
?>
<script src="app/jquery-1.11.1.js"></script>
<!-- <script src="app/error_e_module.js"></script> -->
<script src="app/app.js"></script>
<script src="app/ico_module.js"></script>

</body>
</html>