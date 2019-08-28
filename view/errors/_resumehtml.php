<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php
                    switch(CandidateModel::$_error_resume_msg_):
                        case 0:
                        print Errors::$_resume['alert'][0];
                        break;

                        case 1:
                        print Errors::$_resume['alert'][1];
                        break;

                        case 2:
                        print Errors::$_resume['alert'][2];
                        break;
                    endswitch;
                ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
</div>