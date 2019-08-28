<?php   

include $_SERVER['DOCUMENT_ROOT'] . "/project_naukri/inc/head.inc.php";

setcookie('tkl', $_GET['login']);

include_once "inc/header.inc.php";
?>

<style>
input[type='checkbox']{
appearance: none;
-webkit-appearance: none;
-moz-appearance: none;
border-radius: 0;
padding: .3em;
background-color: #9e9e9e !important;
border: 0 !important;
color: white;
}
input[type='checkbox']:hover,input[type='checkbox']:focus{
  border:0 !important;
}
</style>
</head>

<body>
  
  
  <section id="container" >
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
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h4 class="page-header"><i class="fa fa-user-md"></i>ADMIN PANEL</h4>
            <ol class="breadcrumb">
              <li><a href="">Home</a></li>
              <li>Profile</li>
            </ol>
          </div>
        </div>
        <div class="row">
          <!-- profile-widget -->
          <div class="col-lg-12">
            <div class="profile-widget profile-widget-info">
              <div class="panel-body">
                <div class="col-lg-2 col-sm-2">
                  <h4> WELCOME </h4>
                  <h5><?php print $_SESSION['compname'] ?></h5>
                </div>
                <div class="col-lg-4 col-sm-4 follow-info">
                  <p>Hello, <?php print $_SESSION['hrname'] ?>
                    <br/>
                  </p>
                  <p><i class="fa fa-twitter"></i> 
                    <?php print $_SESSION['hremail'] ?>
                  </p>
                  <h6>
                      <span><i class="icon_clock_alt"></i><?php 
                      $date = date_default_timezone_set('Asia/Kolkata');
                      //Get Only Current Time 00:00 AM / PM 
                      echo $today = date("g:i a"); ?></span>
                      <span>
                        <i class="icon_calendar"></i>
                        <?php 
                        //If you want Day,Date with time AM/PM
                        echo $today = date("F j, Y, g:i a T"); ?>
                      </span>
                  </h6>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- page start-->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading tab-bg-info">
                <ul class="nav nav-tabs">
                
                  <li class="active">
                    <a data-toggle="tab" href="#profile"><i class="icon-user"></i>Admin profile</a>
                  </li>
                  <li>
                    <a data-toggle="tab" href="#edit-profile"><i class="icon-envelope"></i>
                    Edit Profile</a>
                  </li>
                </ul>
              </header>
              <div class="panel-body">
                <div class="tab-content">
                  <!-- profile -->
                  <div id="profile" class="tab-pane active">
                    <section class="panel">
                      <div class="panel-body bio-graph-info">
                        <h1>Bio Graph</h1>
                        <div class="row">
                          <div class="bio-row">
                            <p><span>First Name </span>: 
                              <?php print $_SESSION['hrname'] ?>
                            </p>
                          </div>
                          <div class="bio-row">
                            <p><span>Register on</span>: 
                              <?php print $_SESSION['signupdate'] ?>
                            </p>
                          </div>
                          <div class="bio-row">
                            <p><span>Location </span>: <?php print $_SESSION['loc']  ?></p>
                          </div>
                          <div class="bio-row">
                            <p><span>Designation </span>: HR Head</p>
                          </div>
                          <div class="bio-row">
                            <p><span>Email </span>: <?php print $_SESSION['hremail'] ?></p>
                          </div>
                          <div class="bio-row">
                            <p><span>Mobile </span>: <?php print $_SESSION['phone'] ?></p>
                          </div>
                          <div class="bio-row">
                            <p><span>Landline </span>: Ext. 051</p>
                          </div>
                          <div class="bio-row">
                            <p><span>Login Time</span>: <?php print $_SESSION['login_time'] ?></p>
                          </div>
                        </div>
                      </div>
                    </section>
                    <section>
                      <div class="row"></div>
                    </section>
                  </div>
             
                  <div id="edit-profile" class="tab-pane">
                    <section class="panel">
                      <div class="panel-body bio-graph-info">
                        <h1> Profile Info</h1>
                        <div class="row">
                          <div class="col-md-6 offset-md-3">
                            <p style="color:#f02">Note: while doing changes please make sure your data is valide, true & not empty.</p><br/>
                          </div>
                        </div>

                        <form method="POST" accept-charset="UTF-8" name="formupdate" id="form-update" class="form" >
                              <div class="row">
                                <div class="col-md-6 offset-md-3">
                                  <div class="row">
                                    <div class="col-md-3">
                                      <span class="float-left">HR Name: </span>
                                    </div>
                                    <div class="col-md-8">
                                      <input type="text" name="hrname" placeholder="hr name" class="form-control" disabled>
                                      <br>
                                    </div>
                                    <div class="col-md-1">
                                      <input type="checkbox" name="checkbox-hrname" class="fa fa-pencil-square-o btn btn-default btn-update" >
                                    </div>
                                    <div class="col-md-3">
                                      <span class="float-left">HR Email: </span>
                                    </div>
                                    <div class="col-md-8">
                                      <input type="email" name="hremail" placeholder="hr Email" class="form-control" disabled>
                                      <br>
                                    </div>
                                    <div class="col-md-1">
                                      <input type="checkbox" name="checkbox-hremail" class="fa fa-pencil-square-o btn btn-default btn-update" >
                                    </div>
                                    <div class="col-md-3">
                                      <span class="float-left">Company location: </span>
                                    </div>
                                    <div class="col-md-8">
                                      <input type="text" name="companyLocation" placeholder="company location" class="form-control" disabled >
                                      <br>
                                    </div>
                                    <div class="col-md-1">
                                      <input type="checkbox" name="checkbox-companyloc" class="fa fa-pencil-square-o btn btn-default btn-update" >
                                    </div>
                                    <div class="col-md-3">
                                      <span class="float-left">HR Designation: </span>
                                    </div>
                                    <div class="col-md-8">
                                      <input type="type" name="hrdesignation" placeholder="hr designation" class=" form-control"  disabled>
                                      <br>
                                    </div>
                                    <div class="col-md-1">
                                      <input type="checkbox" name="checkbox-hrdesig" class="fa fa-pencil-square-o btn btn-default btn-update" >
                                    </div>
                                    <div class="col-md-3">
                                      <span class="float-left">Phone: </span>
                                    </div>
                                    <div class="col-md-8">
                                      <input type="phone" name="hrphone" placeholder="hr Phone" class="  form-control" disabled>
                                      <br>
                                    </div>
                                    <div class="col-md-1">
                                      <input type="checkbox" name="checkbox-hrphone" class="fa fa-pencil-square-o btn btn-default btn-update" >
                                    </div>
                                    <div class="col-md-9">
                                      <input id="chg-data-btn" class="btn btn-default" name="change_my_data" type="submit">
                                    </div>
                                  </div>
                                </div>
                              </div>
                        </form>
                        <div class="row">
                          <div class="col-md-6 offset-md-3">
                            <div id="updateResult"></div>
                          </div>
                        </div>
                      </div>
                    </section>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>

      </section>
    </section>
  </section>


<?php  include_once "inc/footer.inc.php" ?>

<script id="0092">
  $(function(){
    
    $('#chg-data-btn').click(function(ev)
    {
      ev.preventDefault();
        
        $.ajax({
               method: "POST",
               url: "FormUpdate",
               data: $('.form').serialize(),
               beforeSend:function(data)
               {
                 $('#updateResult').html('loading....');
               },
               success:function(data)
               {
                 $('#updateResult').html(data);
               }
           });

      });
    
  });
 document.getElementById('0092').innerHTML="";
</script>
<script id="8490">
// MODEL FOR SELECTED INPUT UPDATE
let updateview= (function(){
  let btn = document.querySelectorAll('.btn-update'),
      input;

  return{
      allwupdateinput:function(t)
      {
        
        if(t.target.matches('.btn-update')){
          input = t.target.parentElement.previousElementSibling.children[0];
          input.removeAttribute('disabled');
          input.focus();
        }
        else{
          return false;
        }
      } 
  }

})();
let form  = document.querySelector('.form');
form.addEventListener('click', updateview.allwupdateinput);
document.getElementById('8490').innerHTML="";
</script>
</body>

</html>
