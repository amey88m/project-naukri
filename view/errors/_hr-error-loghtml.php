
<?php
#print $_SESSION['_hr_login_token_'];
if(HrSignupFormValidation::$_hr_errors == 1):
    ?>
        <div class='alert alert-danger' role='alert'><?php print Errors::$_hr_err_['alert'][1] ?></div>
    <?php
endif;


if(HrSignupFormValidation::$_hr_errors == 2):
    ?>
        <div class='alert alert-danger' role='alert'> <?php print Errors::$_hr_err_['alert'][2] ?></div>
    <?php
endif;

$_SESSION['_hr_link_token'] = bin2hex(openssl_random_pseudo_bytes(23)).uniqid('',true);
if(HrSignupFormValidation::$_hr_errors == 3):
    ?>
        <div class='alert alert-info' role='alert'>Hi, <?php print $_SESSION["_hr_login_name"] ." ". Errors::$_hr_err_['alert'][3] ?> 
            <a target="_blank" href="hr-login?_id=<?php print $_SESSION['compid'] ?>&_hr_reg_token=<?php print $_SESSION['_hr_link_token'] ?>&_pvt_co_tok=<?php print $_SESSION['_private_token'] ?>"> login</a> now.
        </div>
    <?php
endif;

if(HrSignupFormValidation::$_hr_errors == 4):
    ?>
        <div class='alert alert-success' role='alert'> <?php print Errors::$_hr_err_['alert'][4] ?> <br>
            <a target="_blank" href="hr-login?_id=<?php print $_SESSION['compid'] ?>&_hr_reg_token=<?php print $_SESSION['_hr_link_token'] ?>&_pvt_co_tok=<?php print $_SESSION['_private_token'] ?>"> login</a> now.
        </div>
    <?php
endif;

if(HrSignupFormValidation::$_hr_errors == 5):
    ?>
        Welldone. Just fill the all details below and good to go with <a target="_blank" href="hr-login?_id=<?php print $_SESSION['compid'] ?>&_hr_reg_token=<?php print $_SESSION['_hr_link_token'] ?>&_pvt_co_tok=<?php print $_SESSION['_private_token'] ?>"> login</a> now.
    <?php
endif;
?>
