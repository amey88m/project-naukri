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
					<h6 class="text-left text-danger"> HR LOGIN FORM ! </h6>
					<hr>
					<br>
					<form method="POST"  accept-charset="UTF-8">
						
						<div class="form-group">
							<label for="">Email: </label>
							<input type="email" name="useremail" placeholder="email" class="form-control email" value="<?php (!isset($_POST['useremail']))? "":print $_POST['useremail'];  ?>">
						</div>
						<div class="form-group">
							<label for="">password: </label>
							<input type="password" name="pass" class="form-control pass" placeholder="password" value="<?php (!isset($_POST['pass']))? "":print $_POST['pass'];  ?>" >
						</div>

						<div class="form-group">
							<input type="submit" name="_hrLoginBtn" class="btn btn-info hrLoginBtn" value="send" >
						</div>
					</form>
				</div>
			</div>
		</div>

<script src="app/jquery-1.11.1.js"></script>

</body>
</html>