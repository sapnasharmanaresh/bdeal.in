<?php

class OwnerRequest extends Controller {

    function __construct() {
        parent::__construct();
        $this->loadModel('ownerRequest');
    }

    public function header($title) {
        Modules::run('header', 'ownerrequest', array($title));
        Modules::run('template', 'welcomeNav');
    }
    public function footer(){
        Modules::run('footer','footer');
    }

    function form() {
        $this->header('Ownership Request');
        $this->view->error = $this->model->send();
        $this->view->renderModule('ownerRequest', 'form');
        $this->footer();
    }

    public function track() {
        $this->header('Track Ownership request');
        $this->view->res = $this->model->track();
        //print_r($this->view->res);
        $this->view->renderModule('ownerRequest', 'track');
    }

    public function track_result($data) {
        ECHO "HEKL";
        //print_r($data);
        //$this->view->renderModule('ownerRequest','track-result',$data);
    }

    public function admin() {
        $this->view->res = $this->model->request_detail();
        $this->view->renderModule('ownerRequest', 'admin');
    }

    public function process() {
        $this->view->renderModule('ownerRequest', 'process');
    }

    public function status() {
        $this->model->status();
    }

    public function quality_owner_request() {
        $res = $this->model->quality_owner_request();
        if (empty($res)) {
            
        } else {
            $this->view->res = $res;
        }
        $this->view->renderModule('ownerRequest', 'quality_owner_request');
    }

    public function replyfromqualitydpt() {
        $this->model->replyfromqualitydpt();
    }

    public function check_email_avail() {
        $this->model->check_email_avail();
    }

}

?>
