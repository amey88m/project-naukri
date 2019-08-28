<?php include_once "inc/header.inc.php" ?>

</head>
<body>
  
  <section id="container" class="">
  
    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      
      <a href="empl-profile?login=<?php print $_SESSION['token_log'] ?>" class="logo">
        <span><?php //$title="mynaukri"; print $title; ?></span>
        <span class="w1 w">m</span>
        <span class="w2 w">y</span>
        <span class="w3 w">n</span>
        <span class="w4 w">a</span>
        <span class="w5 w">u</span>
        <span class="w6 w">k</span>
        <span class="w7 w">r</span>
        <span class="w8 w">i</span>
      </a>

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
                    <span class="label label-success"><i class="icon_like"></i></span>
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
              <span class="username"><?php print $_SESSION['hrname'] ?></span>
            </a>
          </li>
        </ul>
      </div>
      </header>

     <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          <li class="active">
            <a class="" href="empl-index">
                <i class="icon_house_alt"></i>
                <span>Dashboard</span>
            </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
                <i class="icon_document_alt"></i>
                <span>Forms</span>
                <span class="menu-arrow arrow_carrot-right"></span>
            </a>
            <ul class="sub">
              <li><a class="" href="hr_form">HR Form</a></li>
            </ul>
          </li>
          <li>
            <a class="" href="chart-chartjs.php">
                <i class="icon_piechart"></i>
                <span>Charts</span>
            </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
              <i class="icon_table"></i>
              <span>Tables</span>
              <span class="menu-arrow arrow_carrot-right"></span>
            </a>
            <ul class="sub">
              <li><a class="" href="team_eye">Team Eye</a></li>
            </ul>
          </li>
          <li>
            <a href="empl-logout">
              <i class="fa fa-sign-out" aria-hidden="true"></i>
              <span>Log out</span>
            </a>
          </li>
        </ul>
      </div>
    </aside>
      
      <section id="main-content">
        <section class="wrapper">
          <div class="row">
            <div class="col-lg-12">
              <h4 class="page-header"><i class="icon_piechart"></i> PROGRESS CHART</h4>
              <ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li>Chart</li>
              </ol>
            </div>
          </div>
          <div class="row">
            <!-- chart morris start -->
            <div class="col-lg-12">
              <section class="panel">
                <header class="panel-heading">
                  <h3>Progress Chart
                </header>
                      <div class="panel-body">
                        <div class="tab-pane" id="chartjs">
                      <div class="row">
                          <!-- Line -->
                          <div class="col-lg-6" style="display: none">
                              <section class="panel">
                                  <header class="panel-heading">
                                      Line
                                  </header>
                                  <div class="panel-body text-center">
                                      <canvas id="line" height="300" width="450"></canvas>
                                  </div>
                              </section>
                          </div>
                          <!-- Bar -->
                          <div class="col-lg-6">
                              <section class="panel">
                                  <header class="panel-heading">
                                      Bar
                                  </header>
                                  <div class="panel-body text-center">
                                      <canvas id="bar" height="300" width="500"></canvas>
                                  </div>
                              </section>
                          </div>
                      </div>
                      <div class="row">
                          <!-- Radar -->
                          <div class="col-lg-6" style="display: none">
                              <section class="panel">
                                  <header class="panel-heading">
                                      <!-- Radar -->
                                  </header>
                                  <div class="panel-body text-center">
                                      <canvas id="radar" height="300" width="400"></canvas>
                                  </div>
                              </section>
                          </div>
                          <!-- Polar Area -->
                          <div class="col-lg-6" style="display: none">
                              <section class="panel">
                                  <header class="panel-heading">
                                      Polar Area
                                  </header>
                                  <div class="panel-body text-center">
                                      <canvas id="polarArea" height="300" width="400"></canvas>
                                  </div>
                              </section>
                          </div>
                      </div>
                      <div class="row">

                          <!-- Pie -->
                          <div class="col-lg-6" style="display: none">
                              <section class="panel">
                                  <header class="panel-heading">
                                      Pie
                                  </header>
                                  <div class="panel-body text-center">
                                      <canvas id="pie" height="300" width="400"></canvas>
                                  </div>
                              </section>
                          </div>
                          <!-- Doughnut -->
                          <div class="col-lg-6" style="display: none">
                              <section class="panel">
                                  <header class="panel-heading">
                                      Doughnut
                                  </header>
                                  <div class="panel-body text-center">
                                      <canvas id="doughnut" height="300" width="400"></canvas>
                                  </div>
                              </section>
                          </div>
                      </div>
                  </div>
                      </div>
                      </div>
                    </section>
              </div>
              <!-- chart morris start -->
            </div>
      </section>
      <!--main content end-->
    </section>



    <!-- Raphael js -->
    <canvas id="my-canvas"></canvas>
    





    <script src="view/empl/Admin/js/jquery.js"></script>
    <script src="view/empl/Admin/js/jquery-1.8.3.min.js"></script>
    <script src="view/empl/Admin/js/bootstrap.min.js"></script>
    <script src="view/empl/Admin/js/jquery.scrollTo.min.js"></script>
    <script src="view/empl/Admin/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="view/empl/Admin/assets/chart-master/Chart.js"></script>
    <script src="view/empl/Admin/js/chartjs-custom.js"></script>
    <script src="view/empl/Admin/js/scripts.js"></script>
    <script src="node_modules/raphael/raphael.min.js"></script>
    <script>
    (function(){
        let canvas = document.getElementById('my-canvas');
        if(canvas.getContext) {
          let ctx = canvas.getContext('2d');
        } 
    })();
    </script>

  </body>
</html>
