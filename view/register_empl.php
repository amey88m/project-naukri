<?php  require_once "../inc/head.inc.php" ?>
</head>
<body>

<!-- NOTE:: Here are social icons 
to get job notification through our social website 
-->
<!-- showFormError -->
<div id="error"></div>


<!-- login form -->

<div class="login-form">
	<div class="login-wrap">
		<h2>Please Read the below details carefully and fill it!</h2>
		<!-- progress bar -->
		<ul class="progress-bar emplprogress-bar">
			<li class="active-bar">Step 1</li>
			<li>Step 2</li>
			<!-- <li>Step 3</li> -->
		</ul>

		<form action="">
			<div class="basic-info activeMe info">
					<span style="color: #f02">Step 1.</span>&nbsp;
					<!-- step 1. -->	
					<!-- Basic information -->
					<span>Your Basic details :</span>
					<input type="text" name="empfull" class="field empfullname" placeholder="Full name" >
					<input type="text" name="empusername" class="field empusername" placeholder="Username" >
					<input type="text" name="empemail" class="field empemail" placeholder="Valide E-mail">
					<input type="password" name="password" class="field password" placeholder="Password">
					<input type="number" name="emphone" placeholder="Valid 10 digit mobile number">
					<input type="date" name="date" placeholder="dob">
					<input type="button" class="btn btn-show-next" value="next">  
			</div>

			<div class="educational-info info">
					<span style="color: #f02">Step 2.</span>&nbsp;
					<!-- step 2. -->	
					<!-- education qualification	details -->			
				<span>Please Let us know about your company details :</span>
				<input type="text" class="companyname" placeholder="company name">
				<select name="qualification" id="qualification-detail" class="qualification">
					<option value="">choose company Location</option>
					<option value="">Mumbai</option>
					<option value="">Pune</option>
					<option value="">Nagpur</option>
					<option value="">Hydrabad</option>
					<option value="">Other</option>
					<input type="text" placeholder="[ please specify other location if any ]">
				</select>
				<input type="text" name="companylink" class="compaylink" placeholder="website eg. www.wetest.com" >
				<textarea cols="10" rows="10" placeholder="please brief us about your company." name="empdesc" minlength="60" maxlength="100" ></textarea>
				<!-- <input type="button" class="btn btn-show-next" value="next">   -->

				<input type="submit" class="btn btn-login btn-submit">
			</div>

			<!-- <div class="opinon-info info">
				<input type="text" placeholder="related course / certificate [ if any ]">
				
				<input type="submit" class="btn btn-login btn-submit">
			</div> -->
		</form>	

	</div>
</div>



<?php  require_once "../inc/footer.inc.php" ?>

<script src="app/code.js"></script>	
<script>
	
</script>
</body>
</html>