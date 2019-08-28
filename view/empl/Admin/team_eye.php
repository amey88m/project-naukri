<?php
include_once "inc/header.inc.php";

$db = new Db;
$sql    = "SELECT HRId,HRName,HREmail,HRPass,HRPic,HRDOB,Rg_date,IsValidEmail,phone FROM hrlogin WHERE compId='{$_SESSION['compid']}' ";
$result = $db->sql($sql);
?>

</head>


<body>
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
                    <img alt="avatar" src="./images/avatar/avatar-boy.jpg">
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
          <!-- alert notification start-->
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
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          <li class="active">
            <a href="empl-index">
                <i class="icon_house_alt"></i>
                <span>Dashboard</span>
            </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:void(0);" >
                <i class="icon_document_alt"></i>
                <span>Forms</span>
                <span class="menu-arrow arrow_carrot-right"></span>
            </a>
            <ul class="sub">
              <li><a href="hr_form">HR Form</a></li>
            </ul>
          </li>
          <li>
            <a class="" href="chart-chartjs">
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
            <h4 class="page-header"><i class="fa fa-table"></i> Team Eye</h4>
            <ol class="breadcrumb">
              <li><a href="index.php">Home</a></li>
              <li>Tables</li>
              <li>Team Eye</li>
            </ol>
          </div>
        </div>
        
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                HR tracker
              </header>
            
              <table class="table table-striped table-advance table-hover text-center">
                <tbody>
                  <tr>
                    <th><i class="fa fa-id-card-o" ></i> HR id</th>
                    <th><i class="icon_profile"></i> Username</th>
                    <th><i class="icon_calendar"></i> Email</th>
                    <th><i class="icon_calendar"></i> Email status(verify)</th>
                    <th><i class="fa fa-key"></i> HR Password</th>
                    <th><i class="fa fa-calendar"></i> Reg Date</th>
                    <th><i class="fa fa-plane"></i> Login status </th>
                    <th><i class="fa fa-clock-o"></i> Login time</th>
                    <th><i class="fa fa-thumbs-o-down"></i> Logout time</th>
                  </tr>
                  <?php  
                     if(is_array($result)):
                        foreach($result as $v):
                  ?>
                  <tr class="">
                      <td><?php print $v['HRId']?></td>
                      <td><?php print $v['HRName']?></td>
                      <td><?php print $v['HREmail']?></td>
                      <td><?php print $v['IsValidEmail']?></td>
                      <td><?php print $v['HRPass']?></td>
                      <td><?php print $v['Rg_date']?></td>
                      <td><?php 
                        if(isset($_SESSION['hr_log_in'])):
                          print "<span style='color: green'>1</span>";
                        else:
                          print "<span style='color: red'>0</span>";
                        endif;
                        ?></td>
                      <td><?php 
                        if(empty($_SESSION['hr_log_in']) | !isset($_SESSION['hr_log_in'])):
                          print "<span style='color: red'>0</span>";
                          else:
                            print $_SESSION['hr_log_in']; 
                        endif;
                        ?></td>
                      <td><?php
                        if(empty($_SESSION['hr_log_out']) | !isset($_SESSION['hr_log_out'])):
                          print "<span style='color: red'>0</span>";
                        else:
                          print $_SESSION['hr_log_out'];
                        endif;
                      ?></td>
                  </tr>   
                  <?php       
                        endforeach;
                      endif; 

                  mysqli_close($db->dbconnection());  
                  ?> 
                 
                </tbody>
              </table>
            </section>
          </div>
        </div>
        <!-- page end-->
      </section>
    </section>
    
    
  </section>
  
  <?php  include_once "inc/footer.inc.php" ?>


</body>

</html>
