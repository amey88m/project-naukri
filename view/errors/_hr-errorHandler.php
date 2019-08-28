<?php

# empty useremail
if(HrLogin::$_hr_error_handler == 1):
    ?>
         <div class="container">
             <div class="row">
                 <div class="col-md-6 offset-3">
                     <div class='alert alert-danger' role='alert'> <br>
                        Email address is empty
                        <script id="43">
                            $(function(){
                                $('.email').focus();
                                return false;
                            });
                            document.getElementById('43').innerHTML= "";
                        </script>
                     </div>
                 </div>
             </div>
         </div>
    <?php
    exit;
endif;

# empty password
if(HrLogin::$_hr_error_handler == 2):
    ?>
         <div class="container">
             <div class="row">
                 <div class="col-md-6 offset-3">
                     <div class='alert alert-danger' role='alert'> <br>
                        password is empty
                        <script id="44">
                            $(function(){
                                $('.pass').focus();
                                return false;
                            });
                            document.getElementById('44').innerHTML= "";
                        </script>
                     </div>
                 </div>
             </div>
         </div>
    <?php
    exit;
endif;


# check for user exits
if(HrLogin::$_hr_error_handler == 3):
    ?>
         <div class="container">
             <div class="row">
                 <div class="col-md-6 offset-3">
                     <div class='alert alert-danger' role='alert'> <br>
                        It seems you are not authorized user so, please ask your `team leader` to send you a `hr registration link` on your email inbox
                     </div>
                 </div>
             </div>
         </div>
    <?php
    exit;
endif;



