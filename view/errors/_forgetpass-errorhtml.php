<div class='container'>
	<div class='row'>
		<div class='col-md-12'>
			
			<div class='alert alert-fixed alert-warning alert-dismissible' role='alert'>
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
				    <span aria-hidden='true'>&times;</span>
				</button>
				  	<span class='msg'>
				  		<?php 
				  		
				  			switch(ResetPasswordModel::$_reset_pass_err):
				  				
				  				case 1:
				  					print Errors::$_err_msg['alert'][0];
								break;
								  
				  				case 2:
				  					print Errors::$_reset_password_msg['alert'][1];
								break;
								  
				  				case 3:
				  					print Errors::$_reset_password_msg['alert'][2];
				  				break;

								case 4:
									print Errors::$_reset_password_msg['alert'][3];
								break;

								case 5:
									print Errors::$_reset_password_msg['alert'][4];
								break;
								
								case 6:
									print Errors::$_reset_password_msg['alert'][5];
								break;

								case 7:
									print Errors::$_err_msg['alert'][6];
								break;

								case 8:
									print Errors::$_reset_password_msg['alert'][6];
								break;

				  			endswitch;
				  		?>
				  	</span>
			</div>
		</div>
	</div>
</div>