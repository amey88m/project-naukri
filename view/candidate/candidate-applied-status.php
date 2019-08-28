<?php 

if(!isset($_SERVER['HTTP_REFERER'])? http_response_code(400) : "" );


include $_SERVER['DOCUMENT_ROOT'] . "/project_naukri/inc/head.inc.php";

ini_set('session.save_path', $_SERVER['DOCUMENT_ROOT'] . '/project_naukri/session');
session_start();
session_id();


//////////////////////////////////////////////
// GET CANDIDATE APPLIED STATUS ON 'APPLY'  //
//////////////////////////////////////////////
if(isset($_GET['cid']) && !empty($_GET['cid'])):

	if($_GET['cid'] == $_COOKIE['clsc'] && $_SESSION['sess_token'] == $_COOKIE['clsc'] && $_SESSION['sess_token'] == $_GET['cid']):
			
		$output = "";
		// require_once root .'classes/Db.php';
		$db = new Db;
		$db->dbconnection();

			// ESCAPE STRING
			// $cid 	 = mysqli_real_escape_string($db->dbconnection(), $_GET['cid']);
			$jobid 	 = mysqli_real_escape_string($db->dbconnection(), $_GET['jobid']);
			$hrid 	 = mysqli_real_escape_string($db->dbconnection(), $_GET['hrid']);

			// print $_SESSION['canId'] . "<br>" . $jobid . "<br>" . $hrid;

			$_SESSION['status_close'] = "close";
				
			// CHECK FOR USER HAVE ALREADY APPLIED FOR SAME JOB?
			$query 		= $db->numRows("SELECT applyId,name,email,canId,jobId,HRId,applydate FROM job_apply WHERE canId='{$_SESSION['canId']}' AND jobId='$jobid' LIMIT 1");
			$rowscount 	= mysqli_num_rows($query);
				
				// check user already apply
				if( $rowscount > 0):
					
					$output =  "You are already applyied to this job, Please try another one.";
					print_r($output);
					// CHECK FOR STATUS
				else:
					sleep(2);
					$output =  "You have successfully applied to job.";
					print_r($output);
						// INSERT INTO job_applied TABLE
						$result = $db->numRows("INSERT INTO job_apply(name,email,canId,jobId,HRId) VALUES('{$_SESSION['sess_user']}','{$_SESSION["sess_email"]}','{$_SESSION['canId']}','$jobid', '$hrid' )");
						return $result;
					exit();	
				endif;
		exit();
	endif;
endif;


?>

