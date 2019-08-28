<?php 
class Errors
{
	

	public static $_err_msg = Array('alert'=>Array(
											'Email is empty',
											'password is empty',
											'You are not registered yet please register first to continue with login. <a href="candidate-signup">Register Me.</a>',
											'Email is not valide, Please provide valide email address',
											'You are already registerd with us you can login. <a href="login">Login Me</a>',
											'Thank you for Registration. Please confirm your email address within 1 hour else you have to register again. Now You can login from here. <a href="login"> Login Me</a>.',
											'It seems you are registered with us but not verified your email address yet. please verifiy your email now! <a href="https://www.google.com/gmail/" target="_blank" style="color:blue">verify my account now</a>'
										));



	public static $_reset_password_msg = Array('alert'=>Array( 1=>'email is not valid', 
															   2=>'You are not register yet please register first. <a href="candidate-signup">Register Me</a>',
															   3=>'Check your inbox. we have successfully send `password reset link` to your inbox',
															   4=>'Please verifiy you email address first, so then only you can able to reset your password.
															   		<a href="https://www.google.com/gmail/" target="_blank"> login to your gmail account </a>
																	   OR <a href="http://127.0.0.1/project_naukri/forget-password">Back to login page</a>',
															   5=>'Your email address is not valide. Make sure you provide valide email address. Thank you.',
															   6=>'Well done your password is re set successfully.'
															));



	public static $_resume = Array('alert'=>
								Array(
									"you can not submit empty data",
									"your resume data is updated successfully.",
									"please verifiyed your email first.",
									"your resume is uploaded successfully."
								)
							);

							
    public static $_hr_reg_ = Array('alert'=>Array(
		1=>'we have successfully send you the `hr signup form link` to your above email address'
	));


	public static $_hr_err_ = Array('alert'=>
											Array(
													1=>'opps! fields looks empty.',
													2=>'password is week min 6 digits required.',
													3=>'you are already with us please continue with your work and',
													4=>'Thank you for your time to register with us. please continue login & start your work. all the best.'
											)
									);


	public static $_hr_activity_err_ = Array('alert'=>
														Array(
																1=> 'company name is empty',
																2=> 'candidate designation is empty',
																3=> 'about job is empty',
																4=> 'status is empty',
																5=> 'no of position is empty',
																6=> 'city field is empty',
																7=> 'other city is empty',
																8=> 'skill are empty',
																9=> 'job is posted successfully',
																10=> 'EOD is send successfully'
															)
														);

}


 ?>