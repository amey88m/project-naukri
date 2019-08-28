<?php

use Email\Email\Email;


class HrActivities extends Model {


    private static $connection;
    public static $errorMssg;
    private $subj;
    private $to;
    private $username;
    private $body;
    private static $fr; // file root

    public static $cmp;



        public static function post_jobs()
        {
            $db = new Db;
            self::$connection = $db->dbconnection();


             # ESC STRING FORM SQL INJ.
            $cmp =  mysqli_real_escape_string(self::$connection, trim($_POST['company']));
            $dsg =  mysqli_real_escape_string(self::$connection, trim($_POST['designation']));
            $abt =  mysqli_real_escape_string(self::$connection, trim($_POST['about']));
            $sts =  mysqli_real_escape_string(self::$connection, trim($_POST['status']));;
            $no_of_openings = mysqli_real_escape_string(self::$connection, trim($_POST['no']));
            $c = mysqli_real_escape_string(self::$connection, trim($_POST['city']));
            $oc = mysqli_real_escape_string(self::$connection, trim($_POST['ocity']));
            $skl = mysqli_real_escape_string(self::$connection, trim($_POST['skil']));

            # FILTER A STRING
            $cmp            = filter_var($cmp, FILTER_SANITIZE_STRING);
            $dsg            = filter_var($dsg, FILTER_SANITIZE_STRING);
            $abt            = filter_var($abt, FILTER_SANITIZE_STRING);
            $sts            = filter_var($sts, FILTER_SANITIZE_STRING);
            $no_of_openings = filter_var($no_of_openings, FILTER_SANITIZE_STRING);
            $c              = filter_var($c, FILTER_SANITIZE_STRING);
            $oc             = filter_var($oc, FILTER_SANITIZE_STRING);
            $skl            = filter_var($skl, FILTER_SANITIZE_STRING);
            
            
            # CHECK FOR EMPTY STRING
            if(empty($cmp)):
                self::$errorMssg = 1;
                Postjobscontroller::loadError('Errors');
                Postjobscontroller::loadError('_hr-activitieshtml');
            endif;

            if(empty($dsg)):
                self::$errorMssg = 2;
                Postjobscontroller::loadError('Errors');
                Postjobscontroller::loadError('_hr-activitieshtml');
            endif;

            if(empty($abt)):
                self::$errorMssg = 3;
                Postjobscontroller::loadError('Errors');
                Postjobscontroller::loadError('_hr-activitieshtml');
            endif;

            if(empty($sts)):
                self::$errorMssg = 4;
                Postjobscontroller::loadError('Errors');
                Postjobscontroller::loadError('_hr-activitieshtml');
            endif;

            if(empty($no_of_openings)):
                self::$errorMssg = 5;
                Postjobscontroller::loadError('Errors');
                Postjobscontroller::loadError('_hr-activitieshtml');
            endif;

            if(empty($c)):
                self::$errorMssg = 6;
                Postjobscontroller::loadError('Errors');
                Postjobscontroller::loadError('_hr-activitieshtml');
            endif;

            if(empty($oc)):
                self::$errorMssg = 7;
                Postjobscontroller::loadError('Errors');
                Postjobscontroller::loadError('_hr-activitieshtml');
            endif;

            if(empty($skl)):
                self::$errorMssg = 8;
                Postjobscontroller::loadError('Errors');
                Postjobscontroller::loadError('_hr-activitieshtml');
            endif;

            $dt = date_default_timezone_set('Asia/kolkata');
            $dt = Date('Y M j, h:i:s:a');
            # CHECK FOR REPETED JOB
            $q = "SELECT jobId FROM job_posted_by_hr WHERE HRId='{$_SESSION["_HR_ID"]}' AND company='$cmp' AND designation='$dsg' AND job_status='$sts' ";
            $result = $db->numRows($q);
            $rowscount = mysqli_num_rows($result);
            if(!empty($rowscount)):
                # you are already posted this job 
                self::$errorMssg = 10;
                Postjobscontroller::loadError('Errors');
                Postjobscontroller::loadError('_hr-activitieshtml');
            else:
                # post job
                # insert data
                $q = "INSERT INTO job_posted_by_hr(company,designation,job_des,job_status,no_of_open,job_location,job_city,HRId,job_posted_on,skills) 
                VALUES('$cmp', '$dsg', '$abt', '$sts', '$no_of_openings', '$c', '$oc', '{$_SESSION["_HR_ID"]}', NOW(), '$skl')";
                $db->numRows($q);
                self::$errorMssg = 9;
                Postjobscontroller::loadError('Errors');
                Postjobscontroller::loadError('_hr-activitieshtml');
            endif;
        }


        public static function yes()
        {
            $db = new Db;
            self::$connection = $db->dbconnection();
            
            $q = "INSERT INTO job_posted_by_hr(company,designation,job_des,job_status,no_of_open,job_location,job_city,HRId,job_posted_on,skills) 
            VALUES('{$_POST["company"]}', '{$_POST["designation"]}', '{$_POST["about"]}', '{$_POST["status"]}', '{$_POST["no"]}', '{$_POST["city"]}', '{$_POST["ocity"]}', '{$_SESSION["_HR_ID"]}', NOW(), '{$_POST["skil"]}')";
            $db->numRows($q);
            self::$errorMssg = 9;
            Postjobscontroller::loadError('Errors');
            Postjobscontroller::loadError('_hr-activitieshtml');
        }




        public static function _candidate_application_recevied()
        {
            $db = new Db;
            self::$connection = $db->dbconnection();
            
            # CHECK FOR job_apply by candidates using `HRID` 
            $sql = "SELECT name,email,canId,applydate,job_posted_on,company,designation,job_city,skills,no_of_open,job_status FROM job_apply as ja INNER JOIN job_posted_by_hr as jp WHERE ja.jobId = jp.jobId AND ja.HRId={$_SESSION['_HR_ID']} ORDER BY ja.applyId ASC";
            
            $result = $db->sql($sql);
            $sr = 1;
            foreach($result as $k=>$rs):
                print "
                    <tr>
                        <td>$sr</td>
                        <td>{$rs['name']}</td>
                        <td>{$rs['email']}</td>
                        <td>{$rs['applydate']}</td>
                        <td>{$rs['job_posted_on']}</td>
                        <td>{$rs['company']}</td>
                        <td>{$rs['designation']}</td>
                        <td>{$rs['skills']}</td>
                        <td>{$rs['job_city']}</td>
                        <td>{$rs['job_status']}</td>
                        <td>{$rs['no_of_open']}</td>
                        <td>resume.doc</td>
                        
                        </tr>
                    ";
                    $sr++;
            endforeach;
        }



        public static function _todo_list()
        {
            $file_name = 'to-do-list.json';
            header("content-Type","application/json");

            if(file_exists($file_name)):
                
                $handler    =   file_get_contents($file_name);
                $json_file  = json_decode($handler, true);
                ?>
                <table class="table table-hover personal-task">
                    <thead>
                        <tr>
                            <th>sr</th>
                            <th>Day</th>
                            <th>Tasks</th>
                            <th>assign to</th>
                            <th>Status</th>
                            <th>Last date</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                <?php
                        foreach($json_file as $val):
                            // 
                        endforeach;
                        foreach($val as $k=>$v):
                            ?>
                            <tr>
                            <td><?php print $v['listid'] ?></td>
                            <td><?php print $v['day'] ?></td>
                            <td><?php print $v['tasks'] ?></td>
                            <td><?php print $v['assignto'] ?></td>
                            <?php
                                if($v['status'] == "urgent"):
                                ?>
                                <td style="color: #f02"><?php print $v['status'] ?></td>
                                <?php
                                elseif($v['status'] == "no urgent"):
                                ?>
                                <td style="color:#000"><?php print $v['status'] ?></td>
                                <?php
                                elseif($v['status'] == "closed"):
                                    ?>
                                    <td style="color: yellow"><?php print $v['status'] ?></td>
                                    <?php
                                elseif($v['status'] == "open"):
                                    ?>
                                    <td style="color:green"><?php print $v['status'] ?></td>
                                    <?php
                                endif;
                            ?>
                            <td><?php print $v['last date'] ?></td>
                            <td>
                                <i class="icon-bell-l"></i>
                                <i class="icon-trash-l"></i>
                            </td> 
                            </tr>
                            <?php
                        endforeach;
                        exit;
                ?>
                    
                    </tbody>
                </table>
                <?php
            else:
                header("location: view/errors/404.php");
                exit;
            endif;

        }




        public static function _sendEod() 
        {

            
            # send EOD using Email
            $name   = $_POST['name'];
            $email  = $_POST['email'];
            $desc   = $_POST['desc'];
            $tok    = $_POST['tok'];

            $db = new Db;
            self::$connection = $db->dbconnection();

            # ESC STRING FROM SQL INJ.
            $name   = mysqli_real_escape_string(self::$connection, trim($name));
            $email  = mysqli_real_escape_string(self::$connection, trim($email));
            $desc   = mysqli_real_escape_string(self::$connection, trim($desc));
            
            # FILTER STRING
            $name   = filter_var($name, FILTER_SANITIZE_STRING );
            $email  = filter_var($email, FILTER_SANITIZE_STRING );
            
            $eod = new HrActivities;
            $eod->to = $_SESSION['_HR_EMAIL']; ###########
            $eod->username = $name;
            $eod->body = "testing eod page!!!";
            $eod->subj = "Generating EOD Report";
            
            
            ##### SEND EOD ON EMAIL ######
            $email = new Email;
            $email->email($eod->subj, $eod->to, $eod->username, $eod->body);
            
            self::$errorMssg = 11;
            HrActivitiescontroller::loadError('Errors');
            HrActivitiescontroller::loadError('_hr-activitieshtml');
        }





        public static function _save_tracker_to_json_file()
        {
            
            error_reporting(0);
            header("Content-type:text/json");
            
            
            # FILE ROOT
            self::$fr = $_SERVER['DOCUMENT_ROOT'] . "/project_naukri/track.json";

            $handle = fopen(self::$fr, 'r');

            # data
            $_tracker_data = json_decode($_POST['candidatetracker']);                
            $current_data = file_get_contents(self::$fr);
            
            # converted into assoc array
            $array_data = json_decode($current_data, true);
            
        
            $_array = Array(
                'name'               =>  $_tracker_data->name,
                'email'              =>  $_tracker_data->email,
                'contact'            =>  $_tracker_data->contact,
                'applydate'          =>  $_tracker_data->date,
                'position'           =>  $_tracker_data->position,
                'resume'             => $_tracker_data->resume
            );
            
            

            $array_data[] = $_array;
            
            $_final_data = json_encode($array_data);
            
            # OPEN FILE
            $handle = fopen(self::$fr, "a+");
            
            # SAVE CONTENT INTO FILE
            file_put_contents(self::$fr, $_final_data);
            
            fclose($handle);

            # show save data
            // self::show_save_tracker_to_json_file();
            self::show_save_data($_POST['candidatetracker']);
            
        }

        public static function show_save_data($d)
        {
            print $d;
        }



        public static function show_save_tracker_to_json_file()
        {
            
            header("Content-type:text/json");
           
            # FILE ROOT
            self::$fr = $_SERVER['DOCUMENT_ROOT'] . "/project_naukri/track.json";

            $handle = fopen(self::$fr, 'r');
            $read = fread($handle, filesize(self::$fr));

            print $read;

        }



        public static function _lineup()
        {
            print "15";
        }
        
        public static function _pipeline()
        {
            print "5";
        }

        public static function _joined()
        {
            print "80";
        }

        public static function _job_opened()
        {
            print "19";
        }

        public static function _job_closed()
        {
            print "5";
        }
        

}