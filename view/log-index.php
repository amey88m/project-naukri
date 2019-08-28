<?php  require_once "inc/head.inc.php"; ?>

<link rel="stylesheet" href= "<?php print 'sass/style.css' ?>">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

<div class="wrap-body">
	<div class="index-wrap">
		<div class="signupWrapper">
			<div class="candidate-wrap">
				<span>Are you Candidate?</span>
				<button type="button" class="btn-candidate-signup btn btn_w" data-attr="candidate-signup">SignUp</button>
			</div>
			<span class="w-or">OR</span>
			<div class="empl-wrap">
				<span>Are you Employer?</span>
				<button type="button" class="btn-employer-signup btn btn_w" data-attr="empl-signup">Signup</button>
			</div>
		</div>
		<div class="loginImgWrapper">
			<button type="button" class="btn btn-login btn_w"  data-attr="login">Login</button>
		</div>
	</div>
</div>



<?php  require_once "inc/footer.inc.php"; ?>

<script src="<?php print 'app/app.js' ?>"></script>
<script src="<?php print 'app/index.js' ?>"></script>
</body>
</html>