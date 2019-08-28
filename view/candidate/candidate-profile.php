<?php 

SessionModel::out_session_candidate();


include $_SERVER['DOCUMENT_ROOT'] . "/project_naukri/inc/head.inc.php"; ?>

<link rel="stylesheet" href="sass/0-plugins/node_modules/bootstrap/bootstrap.css">
<link rel="stylesheet" href="sass/style.css" >
</head>


<body>

<div class="header-msg header-bg-rich">
	<span>WELCOME <?php print $_SESSION['sess_user'] ?></span>
</div>

<?php 
	setcookie('otpmobile','');
	if( $_COOKIE['clsc'] == $_SESSION['sess_token'] && $_COOKIE['clsc'] == $_GET['l-tk']):		
?>
<nav>
	
	<div class="nav-div">
		<i class="bar bar1"></i>
		<i class="bar bar2"></i>
		<i class="bar bar3"></i>
	</div>
	
	<ul class="nav-list ctabs">
		<li><a  class="ctabs-li  ctabs-active" href="javascript:void(0)">Jobs</a></li>
		<li><a  class="ctabs-li" href="jobs_status?status=<?php print $_SESSION['canId']?>">Status</a></li>
		<li><a  class="ctabs-li" href="jobs_applied?apply=<?php print $_SESSION['canId'] ?>">Applied</a></li>
		<li><a  class="ctabs-li" href="#">Latest Jobs</a></li>
		<li><a  class="ctabs-li" href="javascript:void(0)" data-toggle="modal" data-target="#resumeModal">Resume</a></li>
		<li><a  class="ctabs-li" href="logout">Log out</a></li>
	</ul>
	<form class="jobSearch myform" method="POST">
		<input type="text" name="search_job" class="searchjob text-center searchDiv" placeholder="search my job">
		<input type="submit" value="search" class="jobsearchbtn btn-login searchMyJob" >
	</form>
</nav>

<?php
	$db = new Db;
	$db->dbconnection();
	$canid = $_SESSION['canId'];
	$q = "SELECT * FROM candsignup WHERE canId = $canid";
	$result = $db->sql($q);
?>

	<div id="resume_model">
		<div class="modal fade" id="resumeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<form>
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Resume</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
						<?php
							foreach($result as $resume):
						?>
								<div class="card">
									<img src="./images/avatar/avatar-boy.jpg" class="resume-img" alt="" />
									<div class="card-body">
										<h5 class="card-title">about</h5>
										<p class="card-text p"><?php print $resume['selfdescription']?></p>
									</div>
									<ul class="list-group list-group-flush">
										<li class="list-group-item">name : <input class="resume_input resume_name" type="text" value="<?php print $resume['name']?>"></li>
										<li class="list-group-item">first name : <input class="resume_input resume_fname" type="text" value="<?php print $resume['fname']?>"></li>
										<li class="list-group-item">last name : <input class="resume_input resume_lname" type="text" value="<?php print $resume['lname']?>"></li>
										<li class="list-group-item">username : <?php print $resume['username']?></li>
										<li class="list-group-item">email : <?php print $resume['useremail']?></li>
										<li class="list-group-item">qualification : <input class="resume_input resume_qualification" type="text" value="<?php print $resume['qualification']?>"></li>
										<li class="list-group-item">other qualification: <input class="resume_input resume_oqualification" type="text" value="<?php print $resume['otherqualification'] ?>"></li>
										<li class="list-group-item">certification : <input class="resume_input resume_course" type="text" value="<?php print $resume['coursecertified']?>"></li>
										<li class="list-group-item">registration id : <?php print $resume['canId']?></li>
									</ul>
								<!-- </form>
								<form> -->
									<input type="file" class="new-resume-upload border-0 m-0 p-4" placeholder="resume"><!-- upload new resume (if required) -->
								</div>
								<?php endforeach; ?>
							</div>
							<div id="_resume_alert"></div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button id="btn_upload_resume" type="button" name="btn_upload_resume" class="btn btn-info btn_upload_resume">upload My Details</button>
							</div>
						</form>
					</div>
			</div>
		</div>
	</div>


	<!-- jobs -->
	<div id="jobs-section">
		<div class="candidate-article-wraper" id="searchResult"></div>	
	</div>
					
<script src="app/jquery-1.11.1.js"></script>
<script src="sass/0-plugins/node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
<?php 
print 
<<< HERE
	<script id="482e">
		$(function(){
			$("#btn_upload_resume").click(function(e){
				e.preventDefault();
				let name = $('.resume_name');
				let fname = $('.resume_fname');
				let lname = $('.resume_lname');
				let resume_qualification = $('.resume_qualification');
				let resume_oqualification = $('.resume_oqualification');
				let resume_course = $('.resume_course');
				
				$.ajax({
					url: "resume-update",
					method: "POST",
					data: {btnup:1,n:name.val(),f:fname.val(),l:lname.val(),q:resume_qualification.val(),oq:resume_oqualification.val(),c:resume_course.val() },
					success:function(data)
					{
						$("#_resume_alert").html(data);
					}
				});
				
			});
		});
		document.getElementById('482e').innerHTML = "";
	</script>
	<script id='sBtn'>
		(function(){
		
			// get dom element
			var btn = document.querySelector('.nav-div'),
				jobsearch = document.querySelector('.jobSearch');

			btn.addEventListener('click', showMySearchBtn);

			function showMySearchBtn(e)
			{
			 	btn.classList.toggle('bar-active');

			 	if( btn.classList.contains('bar-active'))
					jobsearch.style.display = "block";
				else
					jobsearch.style.display = "none";	
			}

		})();

		document.getElementById('sBtn').innerHTML = "";
		</script>

		<script type="text/javascript" id="wh">
			$(function(){
				var start = 0;
				var count = 2;
				
				$(window).scroll(function(){
						
						if( $(window).scrollTop() == $(document).height() - $(window).height() ){
							// alert(start);
							ajaxcall('fetchjobs__data.php','POST');
							start = start+count;
							return true;
						}else{
							return false;
						}
				});

				ajaxcall('fetchjobs__data.php','POST');
				function ajaxcall(url,method){
					$.ajax({
						url 	: url,
						method  : method,
						data  	: {ajaxfetch:1, start:start, count:count },
						success:function(data){
							$("#searchResult").append(data);
						}
					});
				}

				$('.searchMyJob').click(function(e){
					e.preventDefault();
					$.ajax({
						url 	: 'candidate-search.php',
						method 	: 'POST',
						data 	: { srData:$('.searchDiv').val() },
						beforeSend:function(data){
							$('#searchResult').html('loading..');
						},
						success:function(data){
							$('#searchResult').html(data);
						}
					});
				});
			});
			document.getElementById('wh').innerHTML = "";
		</script>

		<script id='1728933941'>
			//tabs model
			let tab_model = (function(){
							
					let tag, tag_li;

							return{
								removeTabActive:function()
								{
									tag_li = Array.prototype.slice.apply(document.querySelectorAll('.ctabs-li'));
									tag_li.map((tags)=>{
											tags.classList.remove('ctabs-active');
										});
								},
								showmyTabActive:function(t)
								{
									tab_model.removeTabActive();
									
									if(t.target.matches('li'))
										tag = t.target.firstChild;
										t.target.classList.add('ctabs-active');
								}
								
							}

						})();
			
			let ctabs = document.querySelector('.ctabs');
			ctabs.addEventListener('click', tab_model.showmyTabActive);
			document.getElementById('1728933941').innerHTML = "";
		</script>
HERE;
?>


<?php endif; ?>

</body>
</html>


