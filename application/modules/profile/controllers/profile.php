<?php
class Profile  extends Controller{

    function __construct(){
        parent::__construct();
        $this->loadModel('profile');
    }
    
    public function profile(){
            $this->view->res = $this->model->view();
       // print_r($this->view->res);
        $this->view->renderModule('profile','v-profile');
    
    }
    public function profile_detail(){
            $this->view->res = $this->model->view();
        $this->view->renderModule('profile','prof');
    }

}
?>
