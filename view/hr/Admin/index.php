<?php 

include_once "inc/header.inc.php" ?>
<style>
:root{ --bgDefault: #ced874}
#sidebar{ background-color: var(--bgDefault)}
.dark-default{ background-color: #bac17c; color: var(--white)}
ul.sidebar-menu li a{ color: var(--black)}
.icon-trash-l {
	background: url('view/hr/Admin/img/icons/line-icon.png') no-repeat -883px -96px;
	width: 26px;
	height: 27px;
	display: inline-block !important;
}
.icon-trash-l:hover {
  cursor: not-allowed;
  background: url('view/hr/Admin/img/icons/line-icon-hover.png') no-repeat -883px -96px;
	width: 26px;
	height: 27px;
	display: inline-block !important;
}
.mt-1{ margin-top: 1em}
.mt-2{ margin-top: 2em}
.mb-1{ margin-bottom: 1em}
.p-1{ padding: 1rem }
.tg tbody tr td { color: green }
.top-nav .username { color: green }
</style>
</head>

<body>
  <!-- container section start -->
  <section id="container">
    <header class="header dark-default">
    <div class="top-nav notification-row">
       <ul class="nav pull-right top-menu">
          <li id="mail_notificatoin_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <i class="icon-envelope-l"></i>
                <span class="badge bg-important">5</span>
            </a>
            <ul class="dropdown-menu extended inbox">
              <div class="notify-arrow notify-arrow-blue"></div>
              <li>
                <p class="blue">You have 5 new messages</p>
              <li>
                <a href="#">
                  <span class="photo">
                    <img alt="avatar" src="images/avatar/avatar-boy.jpg">
                  </span>
                  <span class="subject">
                    <span class="from">Ray   Munoz</span>
                    <span class="time">1 day</span>
                  </span>
                  <span>Icon fonts are great.</span>
                </a>
              </li>
              <li>
                <a href="#">See all messages</a>
              </li>
            </ul>
          </li>
          <li id="alert_notificatoin_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <i class="icon-bell-l"></i>
                <span class="badge bg-important">7</span>
            </a>
            <ul class="dropdown-menu extended notification">
              <div class="notify-arrow notify-arrow-blue"></div>
              <li>
                <p class="blue">You have 4 new notifications</p>
              </li>
              <li>
                <a href="#">
                    <span class="label label-success">
                      <i class="icon_like"></i>
                    </span>
                    Project 3 Completed.
                    <span class="small italic pull-right"> Today</span>
                </a>
              </li>
              <li>
                <a href="#">See all notifications</a>
              </li>
            </ul>
          </li>
          <li >
            <a href="#">
              <span class="profile-ava">
                  <img alt="" src="images/avatar/avatar-boy.jpg" height="40px" width="40px">
              </span>
              <span class="username"><?php print "Welcome " . $_SESSION['_HR_NAME'] ?></span>
            </a>
          </li>
        </ul>
      </div>
    </header>

     <aside>
      <div id="sidebar" class="nav-collapse ">
        <ul class="sidebar-menu">
          <li>
            <a href="hr-logout">
              <i class="fa fa-sign-out" aria-hidden="true"></i>
              <span>Log out</span>
            </a>
          </li>
        </ul>
      </div>
    </aside>

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <!--overview start-->
        <div class="row">
          <div class="col-lg-12">
            <h4 class="page-header"><i class="fa fa-laptop"></i> hr - Dashboard</h4>
            <ol class="breadcrumb">
              <li><a href="">Home</a></li>
              <li>hr - Dashboard</li>
            </ol>
          </div>
        </div>

          <div class="row">
            <div class="col-md-12">
              <div class="col-md-4">
                <div class="info-box yellow-bg">
                  <i class="fa fa-cubes"></i>
                  <div class="count">
                  <?php
                    $jobs = new HrActivitiescontroller;
                    $jobs->_lineup();
                  ?>
                  </div>
                  <div class="title">today lineup candidate`s</div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="info-box pink-bg">
                  <i class="fa fa-cubes"></i>
                  <div class="count">
                    <?php $jobs->_pipeline(); ?>
                  </div>
                  <div class="title">pipeline candidate`s</div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="info-box brown-bg">
                  <i class="fa fa-cubes"></i>
                  <div class="count">
                    <?php $jobs->_joined() ?>
                  </div>
                  <div class="title">Joined candidate`s</div>
                </div>
              </div>

              
                <div class="col-md-4">
                <div class="info-box red-bg">
                  <i class="fa fa-cubes"></i>
                  <div class="count">
                    <?php
                      $jobs->_job_opened();
                    ?>
                  </div>
                  <div class="title">Job`s open </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="info-box green-bg">
                  <i class="fa fa-cubes"></i>
                  <div class="count">
                    <?php
                      $jobs->_job_closed();
                    ?>
                  </div>
                  <div class="title">Job closed</div>
                </div>
              </div>
            </div>
              
          </div>
        </div>

          <div class="col-lg-12">
            <!--Project Activity start-->
            <section class="panel">
              <div class="panel-body progress-panel">
                <div class="row">
                  <div class="col-lg-2 task-progress pull-left">
                    <h1>To Do List For Today</h1>
                  </div>
                  <div class="col-lg-10">
                    <span class="profile-ava pull-right">
                        <img alt="" src="images/avatar/avatar-boy.jpg" height="40px" width="40px">
                        <?php print $_SESSION['hrname'] ?>
                    </span>
                  </div>
                </div>
              </div>
              <div id="to-do-list-result"></div>
            </section>
            
            <!-- post the jobs -->
            <section class="panel">
              <div class="panel-body progress-panel">
                <div class="row">
                    <div class="col-lg-2 task-progress pull-left">
                      <h1>Post your jobs : </h1>
                    </div>
                </div>
              </div>
                <div class="row">
                  <div class="col-md-10 col-md-offset-1">
                    <form method="POST" name="psyjform">
                      <div class="row">
                        <div class="col-md-6">
                          <span>company name</span>
                          <input type="text" class="form-control company-name" value="PQR ltd">

                          <span>designation</span>
                          <input type="text" class="form-control candidate-designation" value="hr">

                          <span>about job</span>
                          <input type="text" class="form-control about-job" value="hello world">

                          <span>status</span>
                          <input type="text" class="form-control job-status" value="urgent">
                        </div>
                      <div class="col-md-6">
                        <span>how many position</span>
                        <input type="text" class="form-control noof-position" value="2">
                        <span>city</span>
                        <select name="cities[]" id="cities" class="form-control cities">
                          <option>mumbai</option>
                          <option selected>pune</option>
                          <option>other</option>
                        </select>
                        <span>if other than specify: </span>
                        <input type="text" name='other_city' class='form-control other-city' value="pune">
                        
                        <span>skills</span>
                        <input type="text" class="form-control candidate-skills" value="pune">

                        <input type="submit" name="" class="btn btn-info btn-sm mt-1 mb-1 btn-post-your-job">
                        <div id="post-your-jobs-alert"></div>
                      </div>
                    </form> 
                  </div>
                </div>
            </section>

            <!-- application recevied -->
            <section class="panel">
              <div class="panel-body progress-panel">
                <div class="row">
                  <div class="col-lg-12 task-progress pull-left">
                    <h1>candidate application`s recevied</h1>
                  </div>
                 </div>
              </div>
              <table class="table table-hover table-responsive tg">
                <thead>
                  <tr>
                    <th>sr</th>
                    <th>name</th>
                    <th>email</th>
                    <th>Date of apply</th>
                    <th>job posted on</th>
                    <th>comp. name</th>
                    <th>apply for position</th>
                    <th>skills</th>
                    <th>city</th>
                    <th>job status</th>
                    <th>no</th>
                    <th>resume</th>
                  </tr>
                </thead>
                <tbody>
                  <?php HrActivitiescontroller::_candidate_application_recevied() ?>
                </tbody>
              </table>
            </section>


            <!-- EOD -->
            <section class="panel">
              <div class="panel-body progress-panel">
                <div class="row">
                  <div class="col-lg-12 task-progress pull-left">
                    <h1>EOD</h1>
                    <h4>send email to your `company hr`</h4>
                  </div>
                 </div>
              </div>
              <div class="row">
                <div class="col-md-10 col-md-offset-1">
                  <div class="row">
                    <div class="col-md-11 md-offset-1">
                        <form method="POST">
                          <div class="row">
                            <div class="col-md-6"> 
                              <span>user name : </span>
                              <input type="text" class="form-control hr-name" value="<?php print $_SESSION['hrname'] ?>">
                              <span>user email : </span>
                              <input type="text" class="form-control hr-email" value="<?php print $_SESSION['hremail'] ?>">
                            </div>
                            <div class="col-md-6">
                              <span>EOD brief : </span>
                              <textarea name="" id="" cols="30" rows="4" class="form-control hr-describe" placeholder="describe EOD" spellcheck="true"></textarea>
                              <input type="submit" class="btn btn-primary btn-xs mt-1 mb-1 btn-EOD" value="send">
                              <div class="eod-result"></div>
                            </div>  
                          </div>
                        </form>
                    </div>
                  </div>
                </div>
              </div>
            </section>
        
            <!-- tracker -->
            <section class="panel">
              <div class="panel-body progress-panel">
                <div class="row">
                  <div class="col-lg-12 task-progress pull-left">
                    <h1>Tracker - Today line up candidate`s</h1>
                  </div>
                 </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <p class="p-1">
                  Here, we have provide you a `tracker.json` file which will maintain all your work recordes. 
                  wait, your work is not finished yet,if you really want`s to check your daily `tracker.json` file you can download it by
                  clicking below.
                  </p>
                </div>
                <div class="col-lg-6">
                    <a class="btn btn-info mt-2" href="<?php print 'http://127.0.0.1/project_naukri/track.json'?>" download>download the tracker</a>
                </div>
              </div>
              <table class="table table-hover personal-task table-responsive" id="table">
                <thead>
                  <tr>
                    <th>sr</th>
                    <th>name</th>
                    <th>email</th>
                    <th>contact </th>
                    <th>Date of apply</th>
                    <th>apply for position</th>
                    <th>resume</th>
                    <th>action</th>
                  </tr>
                </thead>
                <tbody class="tbody">
                  <tr>
                    <form method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                      <td>*</td>
                      <td><input type="text" class="form-control track-name"></td>
                      <td><input type="email" class="form-control track-email"></td>
                      <td><input type="tel" class="form-control track-tel"></td>
                      <td><input type="date" class="form-control track-date"></td>
                      <td><input type="text" class="form-control track-position"></td>
                      <td><input type="file" name="track-resume" class="form-control track-file track-resume"></td>
                      <td><input type="submit" class="btn btn-xs btn-danger btn-tracker-submit" value="save"></td>
                    </form>
                  </tr>
                </tbody>
                <!-- <div id="tracker"></div> -->
              </table>
            </section>

          </div>
        </div>
      </section>
    </section>
  </section>
<?php  include_once "inc/footer.inc.php" ?>

<script id="123">
window.onload = show_data;
  function show_data()
  {
    let xhr = new XMLHttpRequest(),res,
    result = document.querySelector('.tbody');

    if(xhr) {
      xhr.open("GET","track?d="+1+"&token="+new_tk[1], true);
      xhr.setRequestHeader("method","GET");
      xhr.setRequestHeader("token", new_tk[1]);

      xhr.onreadystatechange=function()
      {
        if(xhr.readyState== 4 && xhr.status== 200)
        {
          res = xhr.responseText;
          tracker.show_saved_record(res);
        }
      }
      xhr.send();
    }
  }
  
</script>

<script>
function returnjs(datasource,token) {
  let xhr = new XMLHttpRequest;
  if(xhr) { 
    xhr.open("GET", "view/hr/Admin/js/"+datasource, true);
    xhr.onreadystatechange = function() {
      if(xhr.readyState==4 && xhr.status==200) {
        eval(xhr.responseText);
      }
    }
    xhr.send();
  }
}
</script>
</body>
</html>
