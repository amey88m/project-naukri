<?php include $_SERVER['DOCUMENT_ROOT'] . "/project_naukri/inc/head.inc.php" ?>

    <title><?php print title ?></title>
    <link rel="stylesheet" href="sass/0-plugins/node_modules/bootstrap/bootstrap.css">
    <style>
    section { width: 300px; border: 0; height: auto; background-color: #f2f2f2; margin: 20px auto; box-sizing: border-box; padding: 1em}
    form { display: block; }
    input { display: block; box-sizing: border-box; width: 100%; margin: 0 ; margin-bottom: 1em; line-height: 2rem; padding-left: 1em}
    .btn-reset-password { display: block; margin: 0 auto; text-align: center; width: 150px; height: 40px; cursor: pointer}
    </style>
    
</head>
<body>

<div id="return_alert"></div>

<section>
    <form method="post">
        <input type="text" name="" value="<?php print $_SESSION['resN'] ?>" disabled="true" > 
        <input type="email" name="" value="<?php print $_SESSION['resE'] ?>" disabled="true"> 

        <input type="password" name="enter_password" class="enter_password" placeholder="password" value="<?php (isset($_POST['enter_password']))? print $_POST['enter_password']:"" ?>" >
        <input type="password" name="re_enter_password" class="re_enter_password" placeholder="re enter password" value="<?php (isset($_POST['re_enter_password']))? print $_POST['re_enter_password']:"" ?>" ?>

        <input type="submit" class="btn-reset-password" name="btn-reset-password">
    </form> 
</section>



<script src="app/jquery-1.11.1.js"></script>
<script src="sass/0-plugins/node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
</body>
</html>