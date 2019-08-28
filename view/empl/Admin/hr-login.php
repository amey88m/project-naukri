<?php 
use \Admin\Dbconnection\Db as connection;

session_save_path($_SERVER['DOCUMENT_ROOT'] . '/project_naukri/' . '/session/');
session_start();
session_id();

session_regenerate_id(true);


include $_SERVER['DOCUMENT_ROOT'] . "/project_naukri/inc/head.inc.php";
require_once "_autoload.php";
require_once root."db/Db.php";

$db = new connection;


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title></title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<style>
	body{
		background-image: linear-gradient(rgba(0,0,0,0.8), rgba(0,0,0,.5)), url('../../../images/home-office-336378_1920.jpg');
		background-repeat: no-repeat;
		background-position: center center;
		background-attachment: fixed;
		background-size: cover;
		overflow: hidden;
		z-index: -9;
		position: relative;
	}
.br-0{ border-radius: 0 !important }
</style>
</head>
<body>
	
	<div class="jumbotron br-0" >
		<div class="container">
			<div class="row">
				<div class="col-md-6 offset-3">
					<h4 class="text-center">HR Login</h4>
					<form class="form">
						<div class="form-group">
							<label for="">HR Email :</label>
							<input type="text" class="form-control" placeholder="email">
						</div>
						<div class="form-group">
							<label for="">Password : </label>
							<input type="Password" class="form-control" placeholder="******">
						</div>
						<input type="submit" name="hr_login_btn" class="btn btn-info btn-sm px-4" value="GO">
					</form>
				</div>
			</div>
		</div>
	</div>


</body>
</html>