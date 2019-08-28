<?php 

if(!isset($_SERVER['HTTP_REFERER'])? http_response_code(400) : "" );


ini_set('session.save_path', $_SERVER['DOCUMENT_ROOT'] . '/project_naukri/session');
session_start();
session_regenerate_id(true);


include $_SERVER['DOCUMENT_ROOT'] . "/project_naukri/inc/config.inc.php";

		
		if(empty($_POST['srData']) | !isset($_POST['srData'])):
			http_response_code(404);
			exit();
		endif;




if( isset($_POST['srData']) ):

	require_once root . 'classes/Db.php';	

	// connection
	$db = new Db;
	$db->dbconnection();

	$searchVal   = mysqli_real_escape_string($db->dbconnection(), $_POST['srData']);

	$search_val  = explode(', ', $searchVal);
	$search 	 = implode(' ', $search_val);
	$searchValue = str_replace(" "," ", $search);
	$new_string_val = filter_var($searchValue,FILTER_SANITIZE_STRING);

	// REGEX FOR STRING PATTERN
	$reg_search = "/^[a-z]$/";
		
		$sql = "SELECT * FROM job_posted_by_hr WHERE skills LIKE '%$new_string_val%' ";
		$query = $db->numRows($sql);
		$rowscount = mysqli_num_rows($query);
		
		if($rowscount === 0 | empty($searchVal) | preg_match($reg_search, $searchVal) ):
			echo"
				<span style='color:#f02;'>$searchVal not found or it is not relevent.</span>
			";
		else:
			// FETCH SEARCH DATA 
			$query = $db->sql("SELECT * FROM job_posted_by_hr j INNER JOIN hrlogin h ON j.HRId = h.HRId WHERE j.skills LIKE '%$searchVal%' ORDER BY j.jobId DESC");
			
			if(is_array($query)):
				foreach($query as $val):
					include "jobs__data__output.php";
					print_r($output);
				endforeach;
			endif;
		endif;

endif;

?>