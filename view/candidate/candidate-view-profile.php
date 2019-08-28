<?php  
SessionModel::out_session_candidate();
include $_SERVER['DOCUMENT_ROOT'] . "/project_naukri/inc/head.inc.php";
?>
<link rel="stylesheet" href="sass/style.css" >
</head>
<body>
<?php 
require_once root . 'classes/Db.php';

		if(empty($_GET['cvp']) | $_GET['cvp'] != $_SESSION['canId']):
			http_response_code(404);
			exit();
		endif;

if(isset($_GET['cvp'])):

	$db = new Db;
	$db->dbconnection();	
	
	$sql = "SELECT canId,name,fname,lname,username,useremail,qualification,otherqualification,coursecertified,selfdescription,skills FROM candsignup WHERE canId = {$_SESSION['canId']} ";
	

	$resultset = $db->sql($sql);
	
		if(is_array($resultset)):
			foreach($resultset as $val):
				//
			endforeach;
		endif;

		

 ?>
<div class="tabel-wraper">
	<form method="POST">
		
		<h3 class="h3">qualification information</h3>
		<table class="mb-2">
			<tr>
				<th>qualification</th>
				<th>other Qualification</th>
			</tr>
			<tr>
				<td><input type="text" value="<?php print $val['qualification']; ?>"></td>
				<td><input type="text" value="<?php print $val['otherqualification']; ?>"></td>
			</tr>
		</table>	
		<input type="button" class="btn btn-update" value="update">
		<input type="button" class="btn btn-save" value="save">
	
		<h3 class="h3">course certification information</h3>
		<table class="mb-2"	>
			<tr>
				<th>course certification</th>
				<th>self description</th>
				<th>skills</th>
			</tr>

			<tr>
				<td><input type="text" value="<?php print $val['coursecertified'] ?>"></td>
				<td><input type="text" value="<?php print $val['selfdescription'] ?>"></td>
				<td><input type="text" value="<?php print $val['skills'] ?>"></td>
			</tr>
		</table>
		<input type="button" class="btn btn-update" value="update">
		<input type="button" class="btn btn-save" value="save">
		
		<h3 class="h3">personal information</h3>
		<table class="mb-2">
			<tr>
				<th>email</th>
			</tr>
		
			<tr>
				<td><input type="email" value="<?php print $val['useremail'] ?>"></td>
			</tr>
		</table>
		<input type="button" class="btn btn-update" value="update">
		<input type="button" class="btn btn-save" value="save">
		
		<h3 class="h3">personal information</h3>	
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<form method="POST" accept-charset="UTF-8" >		
							<div>
								<label for="updatemyresume">Yes please I send me link to my <?php print $val['useremail'] ?> so I can upload my updated profile.</label>
								<input type="checkbox" class="" id="updatemyresume">
								<input type="submit" name="upmp" class="btn btn-update"> 
							</div>
					</form>
				</div>
			</div>
		</div>
		

	</form>
</div>


<?php 	

endif;

 ?>

</body>
</html>