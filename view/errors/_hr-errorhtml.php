<div class='container'>
	<div class='row'>
		<div class='col-md-12'>
			<div class='alert alert-fixed alert-warning alert-dismissible' role='alert'>
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
				    <span aria-hidden='true'>&times;</span>
				</button>
				  	<span class='msg'>
				  		<?php 
				  				
				  			switch(SendHREmail::$_hr_signup_email_link_err):
                                
                                case 1:
                                print Errors::$_hr_reg_['alert'][1];
                                break;

							endswitch;
							

				  		?>
				  	</span>
			</div>
		</div>
	</div>
</div>