<?php 
SessionModel::start_session();

include_once "inc/header.inc.php";

?>

</head>

<body>
  <!-- container section start -->
  <section id="container">

    <header class="header dark-bg">
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
              <span class="username"><?php print $_SESSION['hrname'] ?></span>
            </a>
          </li>
        </ul>
      </div>
    </header>

     <aside>
      <div id="sidebar" class="nav-collapse ">
        <ul class="sidebar-menu">
          <li class="active">
            <a href="empl-index">
                <i class="icon_house_alt"></i>
                <span>Dashboard</span>
            </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:void(0)" >
                <i class="icon_document_alt"></i>
                <span>Forms</span>
                <span class="menu-arrow arrow_carrot-right"></span>
            </a>
            <ul class="sub">
              <li><a href="hr_form">HR Form</a></li>
            </ul>
          </li>
          <li>
            <a href="chart-chartjs">
                <i class="icon_piechart"></i>
                <span>Charts</span>
            </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:void(0);" class="">
                <i class="icon_table"></i>
                <span>Tables</span>
                <span class="menu-arrow arrow_carrot-right"></span>
            </a>
            <ul class="sub">
              <li><a href="team_eye">Team Eye</a></li>
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

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <!--overview start-->
        <div class="row">
          <div class="col-lg-12">
            <h4 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h4>
            <ol class="breadcrumb">
              <li><a href="">Home</a></li>
              <li>Dashboard</li>
            </ol>
          </div>
        </div>

          <div class="row">
            <div class="col-md-12">
              <div class="col-md-4">
                <div class="info-box blue-bg">
                  <i class="fa fa-cubes"></i>
                  <div class="count">1.426</div>
                  <div class="title">work on progress</div>
                </div>
              </div>
                <div class="col-md-4">
                <div class="info-box red-bg">
                  <i class="fa fa-cubes"></i>
                  <div class="count">1.426</div>
                  <div class="title">Pending task</div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="info-box green-bg">
                  <i class="fa fa-cubes"></i>
                  <div class="count">1.426</div>
                  <div class="title">Completed task</div>
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
                    <h1>To Do Everyday</h1>
                  </div>
                  <div class="col-lg-10">
                    <span class="profile-ava pull-right">
                        <img alt="" src="images/avatar/avatar-boy.jpg" height="40px" width="40px">
                        <?php print $_SESSION['hrname'] ?>
                    </span>
                  </div>
                </div>
              </div>
              <table class="table table-hover personal-task">
                <thead>
                  <tr>
                    <th>Day</th>
                    <th>Tasks</th>
                    <th>assign to</th>
                    <th>Status</th>
                    <th>Last date</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </section>
          </div>
        </div>
      </section>
    </section>
  </section>
  
<?php  include_once "inc/footer.inc.php" ?>
  
  

    <script>
      //knob
      $(function() {
        $(".knob").knob({
          'draw': function() {
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
        $("#owl-slider").owlCarousel({
          navigation: true,
          slideSpeed: 300,
          paginationSpeed: 400,
          singleItem: true

        });
      });

      //custom select box

      $(function() {
        $('select.styled').customSelect();
      });

      /* ---------- Map ---------- */
      $(function() {
        $('#map').vectorMap({
          map: 'world_mill_en',
          series: {
            regions: [{
              values: gdpData,
              scale: ['#000', '#000'],
              normalizeFunction: 'polynomial'
            }]
          },
          backgroundColor: '#eef3f7',
          onLabelShow: function(e, el, code) {
            el.php(el.php() + ' (GDP - ' + gdpData[code] + ')');
          }
        });
      });
    </script>

</body>

</html>
