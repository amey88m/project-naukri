<?php
$_SESSION['_HR_Rg_TOKEN'] = " ";
setcookie('8_18_9_4','');
setcookie('_20','');
SessionModel::_out_session_hr();
header("location: hr-login?_id={$_SESSION['compid']}&_hr_reg_token={$_SESSION['_hr_link_token']}&_pvt_co_tok={$_SESSION['_private_token']}");
