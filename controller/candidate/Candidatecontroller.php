<?php
class Candidatecontroller extends Controller {

    

        public static function _resume_update_data()
        {

            SessionModel::start_session();
            CandidateModel::_resume_update();
            self::loadError('Errors');
            self::loadError('_resumehtml');
        }


        public static function _job_applied()
        {
            self::loadView('candidate/jobs_applied');
        }


        public static function _view_profile()
        {
            self::loadView('candidate/candidate-view-profile');
        }
}