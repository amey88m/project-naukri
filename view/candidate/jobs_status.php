<?php  
SessionModel::out_session_candidate();
include $_SERVER['DOCUMENT_ROOT'] . "/project_naukri/inc/head.inc.php";
if(empty($_GET['status']) | $_GET['status'] != $_SESSION['canId'] | !isset($_GET['status'])):
	### LOGIN RULE APPLIED #####
	header("location: login.php");
	exit();
endif;



if(isset($_GET['status']) && isset($_SESSION['canId'])):
?>
<link rel="stylesheet" href="style.css" >
<style>
.green { color: green; text-transform: capitalize}
.yellow { color: yellow; text-transform: capitalize }
.red { color: red; text-transform: capitalize }
</style>
</head>
<body>

<div id="candidate_apply_data"></div>
<div class="tabel-wraper">
<?php
	// FETCH DATA FROM DB
	// SHOW APPLIED JOBS ONLY
		$db = new Db;
		$db->dbconnection();
		$q 		= $db->sql("SELECT * FROM job_apply a INNER JOIN hrlogin l ON a.HRId=l.HRId ORDER BY a.HRID ");
		$query 	= $db->sql("SELECT * FROM job_apply j INNER JOIN job_posted_by_hr h ON j.jobId=h.jobId WHERE j.canId={$_SESSION["canId"]} ORDER BY j.jobId");
		if(is_array($q)):
			foreach($q as $v):
				$value = $v;
			endforeach;
		endif;
		if(is_array($query)):
			foreach($query as $val):
?>
			<table>		
				<tr>
					<td>company name</td>
					<td>:</td>
					<td><?php print  $val['company'] ?></td>
				<tr>
				<tr>
					<td>Designation</td>
					<td>:</td>
					<td><?php print  $val['designation'] ?> </td>
				</tr>
				<tr>
					<td>Application date</td>
					<td>:</td>
					<td><?php print $val['job_posted_on'] ?></td>
				</tr>
				<tr>
					<td>Interview venue</td>
					<td>:</td>
					<td><?php print $val['job_location'] ?></td>
				</tr>
				<tr>
					<td>contact person</td>
					<td>:</td>
					<td><?php print $value['HRName'] ?></td>
				</tr>
				<tr>
					<td>contact email</td>
					<td>:</td>
					<td><?php print $value['HREmail'] ?></td>
				</tr>
				<tr>
					<td>Interview status</td>
					<td>:</td>
                    
                    <?php 
                    switch($val['job_status']):    
                        case "open":
                        ?>
                        <td class="green"><?php print $val['job_status']; ?></td>
                        <?php
                        break;
                        case "urgent":
                        ?>
                        <td class="yellow"><?php print $val['job_status']; ?></td>
                        <?php 
                        break;
                        case "closed":
                        ?>
                        <td class="red"><?php print $val['job_status']; ?></td>
                        <?php
                        break;
                    endswitch;
                    ?>
				</tr>
				<tr>
					<td>HR. status - pending | rejected</td>
					<td>:</td>
				</tr>
			</table><br><br>
<?php  
			endforeach;
		endif;
else:
	unset($_SESSION['canId']);
endif;
?>
</div> <!-- //tabel-wraper -->
</body>
</html>

