<?php 
SessionModel::start_session();
include $_SERVER['DOCUMENT_ROOT'] . "/project_naukri/inc/head.inc.php";
?>
ljlkj
<link rel="stylesheet" href="sass/style.css" >



<?php 
if( isset($_POST['hrsubmit'])):
	if(is_array( $_POST['email'] )):
		foreach($_POST['email'] as $input):
			$arr[] = $input;
		endforeach;
	endif;
	$val = implode(', ', $arr);
	$val = str_replace(", ", "<br/>", $val);

	$output =	 "
					<div id='response-wrap' class='active'>
						<span class='responseError'>Email is send successfully.</span>
						<span class='close'><i class='fa fa-times'></i></span>
					</div> 
				";
	echo $output;

	///////////////////////////////////////////////////////////
	// send Email /////////////////////////////////////////////
	//////////////////////////////////////////////////////////
	

endif;

 ?>

</head>
<body>
<div class="header-msg default-bg"><span>WELCOME <?php echo $_SESSION['compHremail'];  ?></span></div>
	<div id="tab">
		<nav class="empl-profile">			
			<ul class="nav-list empl-profile-wrap">
				<li class="active"><a>Admin panel</a></li>
				<li><a >HR</a></li>
				<li><a >View My Profile</a></li>
			</ul>
		</nav>

		<div id="empl-profile-wrap">
			<div class="adminpanel ppanel">
				<section>
					<p>This is admin panel</p>
				</section>
			</div>
			<div class="hrpanel ">
				<section>
					<form class="hrpanel__form" method="POST" autocomplete>
						<!-- <span>Add my hr </span> -->
						<div id="input_wrap"><!-- input --></div>
						<input type="submit" name="hrsubmit" class="btn hrpanel__btn dis-n">
					</form>
					<p class="terms">*user guide: 	
						<br/> step 1. Send email link to your HR. 
						<br/> step 2. Once you send email to HR. your work is done.
						<br/> step 3. He/She has to verify email and login by setting his password.
						<br/> step 4. well done now you can check your HR day-to-day activity.
					</p>
					<!-- add hr button -->
					<button id="addHrBtn" class="btn addHrBtn bg-org">+ HR</button>
				</section>					
			</div>
			<div class="viewprofile">
				<section>
					<p>This is viewprofile</p>
				</section>
			</div>
		</div>
	</div> <!-- // #tab -->


<script src="../../app/jquery-1.11.1.js"></script>
<script src="../../app/error_e_module.js"></script>


<script id="799727" >

(function(){
// add hr

// get dom element
var addHrBtn 	= document.querySelector('#addHrBtn'),
	inputWrap 	= document.querySelector('#input_wrap'),
	hrpanelBtn  = document.querySelector('.hrpanel__btn'),
	input 		= document.querySelectorAll('input');

	function createInputElement(e)
	{	
		e.preventDefault();
		var input = document.createElement('input');
		input.className = 'dis-b';
		input.type = 'email';
		input.name = 'email[]';
		input.setAttribute('placeholder','email');
		inputWrap.prepend(input);
		hrpanelBtn.classList.add('btn-slideUp');
		hrpanelBtn.classList.remove('dis-n');

	}
	addHrBtn.onclick=createInputElement;

	window.onload = hideSubmitBtn;
	
	function hideSubmitBtn(e)
	{
		hrpanelBtn.classList.add('dis-n');
		e.preventDefault();
	}


	// show input fileds even after submit
	hrpanelBtn.onclick=function(){
		createInputElement();
	};

	hrpanelBtn.onclick=createInputElementShow;
	

})();


document.getElementById("799727").innerHTML="";
</script>
</body>
</html>







 