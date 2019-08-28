<?php 
include_once "inc/header.inc.php";

?>
  <style>
  .form-control { 
    border-radius: 0;
    margin-bottom: .3em;
    box-shadow: 0 0 0 0 !important;
   }
   .btn-default { border-radius: 0; transition: background .4s ease;}
   .btn-default:hover { }
   .fa-paper-plane{
    font-size: 2em;
    padding: .3em;
    color: #f99;
    transition: color .4s ease;
    cursor: pointer;
    }
    .fa-paper-plane:hover,.fa-paper-plane:focus{
      color: #ff8080;
    }
  </style>
</head>

<body>

  
  <section id="container" >
    
    <header class="header dark-bg">
      
      <a href="empl-profile?login=<?php print $_SESSION['token_log'] ?>" class="logo">
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
            <a href="javascript:vodi(0)" >
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
            <h4 class="page-header"><i class="fa fa-laptop"></i>  HR FORM </h4>
            <ol class="breadcrumb">
              <li><a href="empl-index">Home</a></li>
              <li>hr form</li>
            </ol>
          </div>
        </div>
  
       <div class="row">
          <div class="col-md-6 ">
            <p style="color:#f02">
            Note: This is the Auhorization process to track & allow your 'new hr team member'.</p><br>
            <form method="POST" enctype="multipart/form-data" >
              <input type="text" name="username" class="form-control user" placeholder="user name">
              <input type="email" name="useremail" class="form-control email" placeholder="user email">
              <label for="emailSend"><i class="fa fa-paper-plane" ></i></label>
              <input type="submit" class="fa fa-paper-plane hide" id="emailSend">
            </form>
            <br><br>
            <p id="email_send_result"></p>
            <br><br>
            <p class="terms">*user guide:   
              <br> step 1. Set username and email. 
              <br> step 2. Once you click on send, your work is done.
              <br> step 3. He/She has to check their account and click the link to start register themself.
              <br> step 4. Team has created successfully.
              <br> step 5. well done, now you can sit back & check your HR`s day-to-day activity from 'Team Eye tab'
            </p>
          </div>
          <div class="col-md-6"></div>
        </div> 

      </section>
    </section> 
   
  </section>

<?php include_once "inc/footer.inc.php" ?>

<script id="092883">
  $(function(){
    let tok = document.cookie;
        tok = tok.split(";");

    $('#emailSend').click(function(e){
      e.preventDefault();
      let resp = document.getElementById('email_send_result'),
          json_user, 
          name = document.querySelector('.user'),
          email= document.querySelector('.email');

      var user = {
         user: name.value,
         email: email.value
      }
      
    if( user.user == 0){
      name.focus();
      return false
    }
    else if(user.email == 0){
      email.focus();
      return false
    } 
    else
      // convert OLN into JSON
      json_user = JSON.stringify(user);
      let xhr,resp_data;
          xhr = new XMLHttpRequest;
          if(xhr)
            xhr.open('POST','SendHREmail',true);
            xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
            xhr.withCredentials = true;
            
            xhr.onreadystatechange=function()
            {
              if(xhr.readyState == 4 && xhr.status == 200)
                resp_data  = xhr.responseText;
                resp.innerHTML = resp_data;
            }
            xhr.send("user="+json_user+"&hrlogtok="+tok[0].split("=")[1]);
    
    });
  });
  document.getElementById('092883').innerHTML="";
</script>
</body>

</html>
