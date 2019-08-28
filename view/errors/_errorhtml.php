<div class='container'>
	<div class='row'>
		<div class='col-md-12'>
			<div class='alert alert-fixed alert-warning alert-dismissible' role='alert'>
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
				    <span aria-hidden='true'>&times;</span>
				</button>
				  	<span class='msg'>
				  		<?php 
				  				
				  			switch(CandidateSignupSuccessModel::$_get_cand_sign_err_val):
				  				case 1:
				  				print Errors::$_err_msg['alert'][0];
				  				break;

				  				case 2:
				  				print Errors::$_reset_password_msg[1];
				  				break;

				  				case 3:
				  				print Errors::$_err_msg['alert'][4];
				  				break;

				  				case 4:
				  				print Errors::$_err_msg['alert'][5];
				  				break;

				  			endswitch;
				  		?>
				  	</span>
			</div>
		</div>
	</div>
</div>