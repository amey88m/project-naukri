<?php 

$output =" 	
					<article class='mb-4'>
						<div class='job-title'>
							<span class='title'>{$val['designation']}</span>
							<small>{$val['company']}</small>
						</div>
						<div class='desg'>Designation : {$val['designation']}</div>
						<p>{$val['job_des']}.</p>
						<div class='city'>{$val['job_city']}</div>
						<div class='skills'>Required Skills : {$val['skills']}</div>
						<div class='date'>
							<span class='inter-day'>Mon - Fri</span> 
							<span class='inter-time'>10am. to 6pm.</span>
						</div>
						<div class='status' data-status={$val['job_status']}>status : {$val['job_status']}</div>
							<div class='desgHr'>
								<div class='contact-person'>{$val["HRName"]} HR</div>
								<div class='contact'><span class='num'>{$val['phone']}</span></div>
								<img src='images/avatar/{$val["HRPic"]}' class='avatar_hr'>
								
							</div>
						
						<div class='hr_wrap'>	
							<div class='contact-to-hr'>
								<a href='javascript:void(0)' class='btn contactHr apply'>
									contact HR
								</a>
								<a href='mailto:{$val["HREmail"]}' class='sendMyResumeToHR hrLink' >Mail HR send my resume to HR</a>
							</div>
						</div>
						<div class='apply__wrap'>
							<button class='apply btn applyToJobBtn' btnid={$val['HRId']}>apply</button>
							<span class='checked_i' data-check='false' job-applied='false' job-applied-id={$val['jobId']}>
								<i class='check fa fa-check'></i>
							</span>
						</div>
					</article>	
		";


?>

				<script type="text/javascript" id='colorchangertxt'>
						(function(){
								// get dom eme
								checkStatus();
								function checkStatus(){
									var txt = Array.prototype.slice.apply(document.querySelectorAll('.status'));

									var txtcolorchanger = txt.map((color)=>{
										
														if(color.dataset.status == 'closed'){
															color.classList.add('closed');
														}else if(color.dataset.status == 'open'){
															color.classList.add('opened');
														}else if(color.dataset.status == 'urgent'){
															color.classList.add('ug');
														}
									});
								}
								showAnimLink();
								function showAnimLink(){
									var articleclick = document.querySelector('.candidate-article-wraper'),
										articles 	 = Array.prototype.slice.apply(document.querySelectorAll('article')),
										hrLinks   	 = Array.prototype.slice.apply(document.querySelectorAll('.hrLink'));
								
										articleclick.onmouseover=(arthover)=>{
											if(arthover.target.matches('article')){
												hrLinks.map((hrlink)=> hrlink.classList.remove('bounceIn'));
												arthover.target.querySelector('.hrLink').classList.add('bounceIn');
											}
										};
								}

								applyTo();
								function applyTo(){
									// get dom ele
									var dele_btn  = document.querySelector('.candidate-article-wraper'),
										checked_i = Array.prototype.slice.apply(document.querySelectorAll('.checked_i')),
										hrLinks   = Array.prototype.slice.apply(document.querySelectorAll('.hrLink')), show_msg;
									
									// event delegate 
									dele_btn.onclick=(applyme)=>{
										if(applyme.target.matches('.applyToJobBtn')){
											
											var applyid = applyme.target.nextElementSibling.getAttribute('job-applied-id'),
												hrid 	= applyme.target.getAttribute('btnid'),
												span 	= document.createElement('span');
												applyme.target.parentElement.append(span);
												span.setAttribute('class','apply_msg');
												show_msg = applyme.target.nextElementSibling.nextElementSibling;
											$.ajax({
												url 	: "candidate-applied-status.php?cid=<?php print $_SESSION['sess_token']?>&jobid="+applyid+"&hrid="+hrid,
												method  : "GET",
												beforeSend:function(data){
													applyme.target.setAttribute('disabled','disabled');
													applyme.target.nextElementSibling.classList.add('result_fade');
													applyme.target.nextElementSibling.setAttribute('data-check','checked');
													applyme.target.nextElementSibling.setAttribute('job-applied','true');
													hrLinks.map((hrlink)=> hrlink.classList.remove('bounceIn'));
												},
												success:function(data){
													show_msg.innerHTML=data;
												}
											});
										}
									};
									var chk = checked_i.map((check)=> check.style.opacity=0 );
								}
								

						})();
						document.getElementById('colorchangertxt').innerHTML = "";
				</script>