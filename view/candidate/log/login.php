<?php
error_reporting(0);
SessionModel::log_session_candidate();

include $_SERVER['DOCUMENT_ROOT'] . "/project_naukri/inc/head.inc.php";

?>
<link rel="stylesheet" href="sass/0-plugins/node_modules/bootstrap/bootstrap.css">
<link rel="stylesheet" href="sass/style.css" >
<header>

<!-- social icon-->
<div class="ico-wrap">
	<ul>
		<li class="link-active"><a href="login"><i class="fa fa-user"></i> Login</a></li>
		<li><a href="forget-password"><small>Yes! I want to reset my password. <br>| forget password?<small></a></li>
	</ul>
</div>
</header>

<!-- login form -->
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="login-form">
				<div class="login-wrap login">
					<h5 class="text-center mb-2 text-uppercase">login</h5>
					<form method="POST">
						<input type="email" class="user_email form-controller" name="uemail" placeholder="email" value="<?php (!isset($_POST['uemail']))?"": print $_POST['uemail'] ?>">
						<input type="password" class="user_password form-controller" name="upassword" placeholder="password" >
						<input type="submit" class="btn btn-login-c btn-submit br-0" name="candidate_login">
					</form>
				</div>
			</div>				
		</div>
	</div>
</div>


<?php  require_once "inc/footer.inc.php" ?>
</body>
</html>