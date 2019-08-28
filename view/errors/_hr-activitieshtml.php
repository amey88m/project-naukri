<?php
if(HrActivities::$errorMssg == 1):
    ?>
        <div class="alert alert-danger" role="alert">
            <?php print Errors::$_hr_activity_err_['alert'][1]; ?>
        </div>
    <?php
endif;



if(HrActivities::$errorMssg == 2):
    ?>
        <div class="alert alert-danger" role="alert">
            <?php print Errors::$_hr_activity_err_['alert'][2]; ?>
        </div>
    <?php
endif;



if(HrActivities::$errorMssg == 3):
    ?>
        <div class="alert alert-danger" role="alert">
            <?php print Errors::$_hr_activity_err_['alert'][3]; ?>
        </div>
    <?php
endif;



if(HrActivities::$errorMssg == 4):
    ?>
        <div class="alert alert-danger" role="alert">
            <?php print Errors::$_hr_activity_err_['alert'][4]; ?>
        </div>
    <?php
endif;



if(HrActivities::$errorMssg == 5):
    ?>
        <div class="alert alert-danger" role="alert">
            <?php print Errors::$_hr_activity_err_['alert'][5]; ?>
        </div>
    <?php
endif;


if(HrActivities::$errorMssg == 6):
    ?>
        <div class="alert alert-danger" role="alert">
            <?php print Errors::$_hr_activity_err_['alert'][6]; ?>
        </div>
    <?php
endif;


if(HrActivities::$errorMssg == 7):
    ?>
        <div class="alert alert-danger" role="alert">
            <?php print Errors::$_hr_activity_err_['alert'][7]; ?>
        </div>
    <?php
endif;


if(HrActivities::$errorMssg == 8):
    ?>
        <div class="alert alert-danger" role="alert">
            <?php print Errors::$_hr_activity_err_['alert'][8]; ?>
        </div>
    <?php
endif;



if(HrActivities::$errorMssg == 9):
    ?>
        <div class="alert alert-success" role="alert">
            <?php print Errors::$_hr_activity_err_['alert'][9]; ?>
        </div>
    <?php
endif;



if(HrActivities::$errorMssg == 10):
    ?>
        <div class="alert alert-success" role="alert">
            <span>You have already posted this job. Do you want to post this job again?</span>
                <form method="POST">
                    <input type="submit" class="btn btn-xs btn-danger btn-no" value="No"> 
                    <input type="submit" class="btn btn-xs btn-success btn-yes" value="Yes">
                </form>
        </div>
    <?php
endif;



if(HrActivities::$errorMssg == 11):
    ?>
        <div class="alert alert-success" role="alert">
            <span>
                <?php  print Errors::$_hr_activity_err_['alert'][10] . " to {$_SESSION['hrname']} @ {$_SESSION['hremail']} " ?>
            </span>
        </div>
    <?php
endif;
