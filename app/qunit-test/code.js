// errors 
// err_module.errorMssgBtn.addEventListener('click', errorHandler);

function errorHandler()
{
	err_module.hideErrorMssg()
}





(function(){

// get the dom elements
var input 	  	  = document.querySelectorAll('.field'),
	firstname 	  = document.querySelector('.firstname'),
	fathername 	  = document.querySelector('.fathername'),
	lastname  	  = document.querySelector('.lastname'),
	
	qualification = document.querySelector('.qualification'),
	otherqul 	  = document.querySelector('.otherqualification'),

	course 		  = document.querySelector('.course'),
	self_desc 	  = document.querySelector('.selfDesc'),
	skills		  = document.querySelector('.skills'),

	username 	  = document.querySelector('.username'),
	useremail 	  = document.querySelector('.email'),
	userpassword  = document.querySelector('.password'),
	
	form 		  = document.querySelector('.registerCandidateForm'),
	formCandidateLoginWrap  = document.querySelector('.login-form'),
	bar 		  = document.querySelector('.progress-bar'),
	// li 			  = bar.querySelectorAll('li'),
	info 		  = document.querySelectorAll('.info'),
	active_bar 	  = document.querySelector('.active-bar'),
	errorcloseIco = document.querySelector('.cl_error_ico'),
	output, target, next, current, prev;


	// form.onclick = validateAllInput;
	// form.addEventListener('click', validateAllInput, false)

					function validateAllInput(e)
					{
						var target 	= module_g.getEventTarget(e);
							
							current = target.parentNode;
							next 	= target.parentNode.nextElementSibling;

								if(target.matches('.btnB') ) // step 1.
								{
									ubi.checkFieldForUserNameBasicDetails();
								}
								else if(target.matches('.btnEdu') ) // step 2.
								{
									uqi.checkFieldForUserqualification();
								}
								else if(target.matches('.btnCourse') ) // step 3.
								{
									uci.checkFieldForUserCourse();
								}
								else if(target.matches('#submit__btn'))
								{
									e.preventDefault();
									// step 4
									ue.checkFieldForUseremail();
									
								}else{
									e.stopPropagation();
								}
					}



	//  step 1.
function ValidateInputBasic(name, fname, lname){
	this.firstname 	= name;
	this.fname 		= fname;
	this.lname 		= lname;
}


	ValidateInputBasic.prototype = {
		constructor:ValidateInputBasic,
		checkFieldForUserNameBasicDetails:function(e)
		{
			if(this.firstname.value == "")
			{
				err_module.showErrorMssg("first name")
				this.firstname.focus();
			}
			else if(this.fname.value == "")
			{
				err_module.showErrorMssg("father name");
				this.fname.focus();
				return false;	
			}
			else if(this.lname.value =="")
			{
				err_module.showErrorMssg("last name");	
				this.lname.focus();
				return false;	
			}else 
			{
				// progress bar
				progressBar();
				// hide the current
				current.classList.remove('activeMe');
				// show the next
				next.classList.add('activeMe');
				err_module.hideErrorMssg();
			}
		}
	};
	// ubi => user basic info
	var ubi = new ValidateInputBasic(firstname,fathername,lastname);




	// step 2.
function ValidateQualification(qualification){
	this.qualification = qualification;
}

	ValidateQualification.prototype = {
		constructor:ValidateQualification,
		checkFieldForUserqualification:function(){
			if(this.qualification.selectedIndex ===0)
			{
				err_module.showErrorMssg("qualification degree");	
				this.qualification.focus();
				return false;
			}
			else
			{
				
				progressBar();
				current.classList.remove('activeMe');
				next.classList.add('activeMe');
				err_module.hideErrorMssg();
			}		
		}
	};

	var uqi  = new ValidateQualification(qualification);




	// step 3.
function ValidateCourse(course,selfdesc,skill){
	this.course   = course;
	this.selfdesc = selfdesc;
	this.skill    = skill;
}

	ValidateCourse.prototype = {
		constructor:ValidateCourse,
		checkFieldForUserCourse:function(){
			if(this.course.value =="")
			{
				err_module.showErrorMssg("your course name");	
				this.course.focus();
				return false;
			}
			else if(this.selfdesc.value =="")
			{
				err_module.showErrorMssg("Tell us about yourself, so we can send relevent job search to you.");	
				this.selfdesc.focus();
				// return false;
			}else if(this.skill.value == ""){
				err_module.showErrorMssg("Enter your skills so we can provide you jobs offer's relevent to your profile.");
				this.skill.focus();
				return false;
			}
			else{
				
				progressBar();
				current.classList.remove('activeMe');
				next.classList.add('activeMe');
			 	err_module.hideErrorMssg();
			}
		}
	};

	var uci = new ValidateCourse(course, self_desc, skills);


	// setp 4.
function ValidateEmail(uname, uemail, upass){
	this.uname  = uname;
	this.uemail = uemail;
	this.upass  = upass;
}

	ValidateEmail.prototype = {
		constructor:ValidateEmail,
		checkFieldForUseremail:function()
		{
			if(this.uname.value =="" )
			{
				err_module.showErrorMssg("user name");	
				this.uname.focus();
				return false;
			}
			else if(this.uemail.value =="")
			{
				err_module.showErrorMssg("email id");					
				this.uemail.focus();
				return false;	
			}
			else if(this.upass.value =="" || this.upass.value.length < 6) //["" || <6].indexOf(this.upass.value)
			{
				err_module.showErrorMssg("min 6 digit password required");					
				this.upass.focus();
				return false;
			}
			else
			{
				signupForm();
				progressBar();
				err_module.hideErrorMssg();
				
			}	
		}
	};

	var ue = new ValidateEmail(username, useremail, userpassword);



})();









	






