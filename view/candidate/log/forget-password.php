<?php  include $_SERVER['DOCUMENT_ROOT'] . "/project_naukri/inc/head.inc.php" ?>
<link rel="stylesheet" href="sass/0-plugins/node_modules/bootstrap/bootstrap.css">
<link rel="stylesheet" href="sass/style.css">
</head>
<body>

<!-- social icon-->
<header>
	<div class="ico-wrap">
		<ul>
			<li><a href="login"><i class="fa fa-user"></i> Login</a></li>
		</ul>
	</div>
</header>


<!-- login form -->
<div class="login-form">
	<div class="login-wrap">
		<div class="row">
			<div class="col-md-8 offset-2">
				<form method="POST"  accept-charset="UTF-8" class="forget-password-form">
					<h6 class="forget-pass-title">Yes ! I don't remember my password. Please reset my password.</h6>
					<input type="text" name="useremail" placeholder="E-mail" class="forget-email" value="<?php (!isset($_POST['useremail']))? "" :print $_POST['useremail'] ?>">
					<input name="reset_password_btn" type="submit" class="forget-pass-btn btn btn-login btn-submit" value="Send">
				</form>
			</div>
		</div>
	</div>
</div>

<?php include_once "inc/footer.inc.php" ?>
</body>
</html>