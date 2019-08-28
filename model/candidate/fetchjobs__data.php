<?php 
SessionModel::start_session();
// ini_set('session.save_path', $_SERVER['DOCUMENT_ROOT'] . '/project_naukri/session');
// session_start();
// session_id();


include $_SERVER['DOCUMENT_ROOT'] . "/project_naukri/inc/head.inc.php";
require_once root.'classes/Db.php';

/////////////////////////////////////////////////
// NOTE : btnid=>jobid , job-appiied-id=>hrid  //
/////////////////////////////////////////////////
// print $_POST['brc'] . "<br>";
// print  $_COOKIE['clsc'];
// print $_SESSION['sess_token'];

if(!isset($_POST['ajaxfetch']) | empty($_POST['ajaxfetch'])):
	http_response_code(404);
	exit();
endif;

	if($_COOKIE['clsc'] == $_SESSION['sess_token']):

		$db = new Db;
		$db->dbconnection();

		// SET START AND END RESULT TO DISPLAY
		$startval 	= mysqli_real_escape_string($db->dbconnection(), $_POST['start']);
		$countval	= mysqli_real_escape_string($db->dbconnection(), $_POST['count']);

		$query = $db->sql("SELECT * FROM job_posted_by_hr j INNER JOIN hrlogin h ON j.HRId = h.HRId ORDER BY j.jobId DESC LIMIT $startval, $countval ");
				
				if( is_array($query) ):
					foreach($query as $val):
						
						$_SESSION['status'] = $val['job_status'];
							include $_SERVER['DOCUMENT_ROOT'] . "/project_naukri/view/candidate/jobs__data__output.php";
						print_r($output);

					endforeach;
				endif;
	endif;			

?>
	
