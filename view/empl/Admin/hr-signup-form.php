<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title></title>
<link rel="stylesheet" href="sass/0-plugins/node_modules/bootstrap/bootstrap.min.css">
</head>



<body  class="jumbotron">
	
		<div class="container">
			<div class="row">
				<div class="col-md-6 offset-md-3">
					<div id="msg"></div>
					<h6 class="text-left text-danger">
						<?php
						HrSignupFormValidation::$_hr_errors = 5;
						print HrSignupFormcontroller::loadError('_hr-error-loghtml');
						?>
					</h6>
					<hr>
					<br>
					<form method="POST"  accept-charset="UTF-8">
						<div class="form-group">
							<label for="">Username: </label>
							<input type="text" name="username" placeholder="name" class="form-control name" value='<?php (!isset($_POST['username']))? "":print $_POST['username'];  ?>' >
						</div>
						<div class="form-group">
							<label for="">Email: </label>
							<input type="email" name="useremail" placeholder="email" class="form-control email" value="<?php (!isset($_POST['useremail']))? "":print $_POST['useremail'];  ?>">
						</div>
						<div class="form-group">
							<label for="">password: </label>
							<input type="password" name="pass" class="form-control pass" placeholder="password" >
						</div>

						<div class="form-group">
							<label for="">DOB: </label>
							<input type="date" name="dob" class="form-control dob" placeholder="dob" >
						</div>
						<div class="form-group">
							<label for="">phone: </label>
							<input type="tel" name="phone" class="form-control phone" placeholder="phone number" <?php (!isset($_POST['phone']))? "":print $_POST['phone']; ?>>
						</div>



						<div class="form-group">
							<input type="submit" class="btn btn-info hrSignupBtn" value="send" >
						</div>
					</form>
				</div>
			</div>
		</div>

<script src="app/jquery-1.11.1.js"></script>


<script id="0192">
$(function(){

	$('.hrSignupBtn').click(function(ev){
		ev.preventDefault();
		
			let j_u,
			name  = document.querySelector('.name'),
			email = document.querySelector('.email'),
			pass  = document.querySelector('.pass'),
			dob   = document.querySelector('.dob'),
			phone = document.querySelector('.phone');

			let user = {
				name  : name.value,
				email : email.value,
				pass  : pass.value,
				dob	  : dob.value,
				phone : phone.value
			}

			// check the empty fileds
			if(user.name == 0 ){
				name.focus();
				return false;
			}
			else if(user.email == 0){
				email.focus();
				return false;
			}
			else if(user.pass == 0){
				pass.focus();
				return false;
			}
			else if(user.dob == 0) {
				dob.focus();
				return false;
			}
			else if(user.phone == 0) {
				phone.focus();
				return false;
			}
			else
				j_uv = JSON.stringify(user);
				 $.ajax({
		              method : "POST",
		              url    : "HrSignupFormValidation",
		              data   : {tk:document.cookie, form:j_uv},
		              beforeSend:function(data)
		              { 
		                $('#msg').html("<img src='' alt='loading..'>")
		              },
		              success:function(data)
		              {
		                $('#msg').html(data);
		              }
		          });

	})

});

document.getElementById('0192').innerHTML = "";
</script>
</body>
</html>