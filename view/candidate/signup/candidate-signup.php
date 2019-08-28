<?php include $_SERVER['DOCUMENT_ROOT'] . "/project_naukri/inc/head.inc.php" ?>

<link rel="stylesheet" href="sass/0-plugins/node_modules/bootstrap/bootstrap.css">
<link rel="stylesheet" href="<?php print 'sass/style.css' ?>" >

</head>
<body>

<div id="registration_form_res"></div>

<!-- showFormError -->
<div id="cl_error">
	<i class="fa fa-times cl_error_ico"></i>
	<h6 class="cl_error_msg"></h6>
</div>

<!-- login form -->
<div class="login-form">
	<div class="login-wrap">
		<h4 class="text-center text-uppercase my-4">Candidate Signup Form!</h4>
		<!-- progress bar -->
		<ul class="progress-bar">
			<li data-index="1" class="active-bar">Step 1</li>
			<li data-index="2">Step 2</li>
			<li data-index="3">Step 3</li>
			<li data-index="4">Step 4</li>
		</ul>



		<form method="POST" id="rg_candidate" class="registerCandidateForm" autocomplete>
			
			<div class="basic-info info activeMe">
					<!-- step 1. -->	
					<span  class="head">Basic details :</span><br/><br/>
					<span class="title">*First Name :</span>
					<input type="text" name="firstname"  class="field firstname" placeholder="First name">
					<span class="title">*Father Name :</span>
					<input type="text"  name="fathername"  class="field fathername" placeholder="Fathername">
					<span class="title">*Last Name :</span>
					<input type="text" name="lastname" class="field lastname" placeholder="Last name" >
					<input type="button" value="next" class="btn btn-show-next btnB">  
			</div>

			<div class="educational-info info ">
					<!-- step 2. -->			
				<span class="head">Qualification details :</span>
				<span class="title">Choose your degree :</span>
					<select name="qualification[]" id="qualification-detail" class="qualification">
							<option value="0">choose qualification</option>
							<option >B.com</option>
							<option >B.A</option>
							<option >M.A</option>
							<option >M.C.A</option>
							<option >B.C.A</option>
							<option >B.Tech</option>
							<option >M.Tech</option>
							<option >Other</option>
					</select>
					<input  name="otherqualification" class="otherqualification" type="text" placeholder="[ please specify other qualification ]">	
					<input  type="button" value="next" class="btn btn-show-next btnEdu">  
			</div>
				
			<div class="opinon-info info">
				<!-- step 3. -->	
				<span class="title">Please let us know about your extra qualification | Certification details :</span>
				<input  type="text" name="course" class="course" placeholder="related course | certificate [ if any ]">

				<span class="title">let us konw about yourself & your profile :</span>

				<textarea name="selfDesc" cols="10" rows="10" class="selfDesc" placeholder="please tell us about yourself." minlength="60" maxlength="1000" value="Hello, I am shraddha I did m.tech from mumbai university. I am woking as freelancer and now looking the new opportunity. I have share my work protfolios with the below linke"></textarea>
				
				<input type="text" name="skills" class="skills" placeholder="skill1,skill2,skill3">
				<input type="button" value="next" class="btn btn-show-next btnCourse">  
			</div>
		

			<div class="info ">
				<!-- step 4. -->
				<span class="head">Profile Details.</span>

				<span class="title">User Name :</span>
				<input type="text" name="username" class="field username" placeholder="username">

				<span class="title">Email Id:</span>
				<input  type="text" name="useremail" class="field email" placeholder="E-mail">

				<span class="title">Password :</span>
				<input  type="password" name="userpassword" class="field password" placeholder="password">

				<input  type="submit" id="submit__btn" name="signupBtn" class="btn btn-login" >
			</div>
		</form>	
	</div>
</div>



<?php include_once "inc/footer.inc.php" ?>
<script src='app/error_module.js'></script>
<script src='app/app.js'></script>
<script src='app/code.js'></script>
<script src='app/progress_bar.js'></script>
<script src="app/can-signupform.js"></script>

</body>
</html>

