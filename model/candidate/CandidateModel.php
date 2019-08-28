<?php

class CandidateModel extends Model {


    protected static $_resume_alert_;
    public static $_error_resume_msg_;
    protected static $connection;

    
        public static function _resume_update()
        {

            if(isset($_POST['btnup']) && !empty($_POST['btnup'])):
                
                $db = new Db;
                self::$connection = $db->dbconnection();
                
                # values ... # remove white space
                $resume_name            = mysqli_real_escape_string(self::$connection, trim($_POST['n']));
                $resume_first_name      = mysqli_real_escape_string(self::$connection, trim($_POST['f']));
                $resume_last_name       = mysqli_real_escape_string(self::$connection, trim($_POST['l']));
                $resume_qualification   = mysqli_real_escape_string(self::$connection, trim($_POST['q']));
                $resume_oqualification  = mysqli_real_escape_string(self::$connection, trim($_POST['oq']));
                $resume_course          = mysqli_real_escape_string(self::$connection, trim($_POST['c']));

                #filter
                $resume_name = filter_var($resume_name, FILTER_SANITIZE_STRING );
                $resume_first_name = filter_var($resume_first_name, FILTER_SANITIZE_STRING );
                $resume_last_name = filter_var($resume_last_name, FILTER_SANITIZE_STRING );
                $resume_qualification = filter_var($resume_qualification, FILTER_SANITIZE_STRING );
                $resume_oqualification = filter_var($resume_oqualification, FILTER_SANITIZE_STRING );
                $resume_course  = filter_var($resume_course, FILTER_SANITIZE_STRING );

                # remove html tag's
                $resume_name            = htmlentities($resume_name);
                $resume_first_name      = htmlentities($resume_first_name);
                $resume_last_name       = htmlentities($resume_last_name );
                $resume_qualification   = htmlentities($resume_qualification);
                $resume_oqualification  = htmlentities($resume_oqualification);
                $resume_course          = htmlentities($resume_course);
                          
                
                # don't allow to submit empty fields
                if(empty($resume_name) || empty($resume_first_name) || empty($resume_last_name) || empty($resume_qualification) ||  empty($resume_oqualification) || empty($resume_course) ):
                    
                    return self::$_error_resume_msg_  = 0;

                else:

                    $q = "UPDATE candsignup SET name='$resume_name', fname='$resume_first_name', lname='$resume_last_name', qualification='$resume_qualification', otherqualification='$resume_oqualification', coursecertified='$resume_course' WHERE canId='".$_SESSION['canId']."' ";
                    $result = $db->numRows($q);
                    return self::$_error_resume_msg_ = 1;
                    
                endif;
                
            
            endif;
        }





}