<?php 

################ index-pg ################

Route::set_route('index', function(){
	SessionModel::start_session(); 
	# CHECK FOR CANDIDATE LOGIN
	if(isset($_SESSION['sess_token'])):
		header('Location: candidate-profile?l-tk='.$_SESSION['sess_token']);
	endif;
	# CHECK FOR EMPLYOER LOGIN
	if(isset($_SESSION['adm_uid'])):
		header("Location: empl-profile?login=".$_SESSION['token_log']);
	endif;
	# else
	Controller::loadView('log-index');
});


####################### CANDIDATE  #######################

Route::set_route('candidate-signup', function(){
	CandidateSignupSuccessController::_signup();
});

Route::set_route('candidate-signup-success', function(){
	CandidateSignupSuccessController::_signup_success();
});

Route::set_route('login', function(){
	CandidateLogcontroller::_log();
});

Route::set_route('candidate-profile', function(){
	CandidateProfilecontroller::success_profile();
});

Route::set_route('jobs_applied', function(){
	CandidateProfilecontroller::_job_apply();
});

Route::set_route('jobs_status', function(){
	CandidateProfilecontroller::_job_status();
});

Route::set_route('fetchjobs__data',function(){
	FetchjobsDatacontroller::_candidate_data();
});

Route::set_route('candidate-applied-status',function(){
	Controller::loadView('candidate/candidate-applied-status');
});

Route::set_route('candidate-search',function(){
	CandidateSearchcontroller::loadView('candidate/candidate-search');
});

Route::set_route('candidate-applied',function(){
	Controller::loadView('candidate/candidate-applied');
});

Route::set_route('jobs_applied',function(){
	Candidatecontroller::_job_applied();
});

Route::set_route('candidate-view-profile',function(){
	Candidatecontroller::_view_profile();
});

Route::set_route('resume-update',function(){
	Candidatecontroller::_resume_update_data();
});

Route::set_route('forget-password', function(){
	ResetPasswordcontroller::_reset_password();
});
####
Route::set_route('set-my-password',function(){
	ResetPasswordcontroller::_reset_password_return();
});

Route::set_route('candidate-signup-email-varify',function(){
	CandidateSignupSuccessController::_is_signup_verified_link_clicked();
});


############################ Admin ##############################

Route::set_route('empl-signup',function(){
	EmplLogcontroller::_signup();
});

Route::set_route('empl-login', function(){
	# employer login page
	EmplLogcontroller::_login();
});

Route::set_route('forget_password', function(){
	EmplLogcontroller::_forget_password();
});

Route::set_route('empl-signup-phone-varify', function(){
	Controller::loadView('./empl/signup/empl-signup-phone-varify');
});


#####################	 ADMIN 	###########################

Route::set_route('empl-index',function(){
	Admincontroller::_admin_index();
});
Route::set_route('empl-profile', function(){
	Admincontroller::_admin_login();
});
Route::set_route('hr_form', function(){
	Admincontroller::_admin_hr_form();
});
Route::set_route('chart-chartjs', function(){
	Admincontroller::_admin_chart();
});
Route::set_route('team_eye', function(){
	Admincontroller::_admin_team();
});
Route::set_route('FormUpdate',function(){
	Admincontroller::_admin_form_update();
});
Route::set_route('empl-logout', function(){
	Admincontroller::_admin_logout();
});

Route::set_route('hr-logout',function(){
	Admincontroller::_hr_logout();
});


######################## HR ############################

Route::set_route('hr-signup-form',function(){
	HrSignupFormcontroller::_signup_form();
});

Route::set_route('HrSignupFormValidation',function(){
	HrSignupFormcontroller::_signup_form_validation();
});

Route::set_route('SendHREmail',function(){
	HrSignupFormcontroller::_send_email_to_hr();
});
## pages => hr-login->(admin,logout...)
##			
Route::set_route('hr-login',function(){
	Hrcontroller::_login();
});
Route::set_route('hr-login-admin',function(){
	Hrcontroller::_login_success();
});
# post your jobs
Route::set_route('psyj',function(){
	Postjobscontroller::job_posted();
});
# post your jobs confim
Route::set_route('psyjc',function(){
	Postjobscontroller::_check();
});
# to do list
Route::set_route("todo",function(){
	HrActivitiescontroller::_todo();
});
# EOD
Route::set_route("eod",function(){
	HrActivitiescontroller::_eod();
});
# tracker
Route::set_route("track",function(){
	HrActivitiescontroller::_tracker();
});


################### Errors 401 ######################
Route::set_route('401', function(){
	Controller::loadError('404');
});


#################### Logout ##############################
Route::set_route('logout',function(){
	Logoutcontroller::logout();
});	