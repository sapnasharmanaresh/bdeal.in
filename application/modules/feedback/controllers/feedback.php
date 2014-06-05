<?php
class Feedback extends Controller{

    function __construct() {
        parent::__construct();
        $this->loadModel('feedback');
    }
    
    public function complaints(){
        $role = Session::get('role');
        if($role == 'admin'){
            $this->view->to_admin = $this->model->complaints_admin();
        }
        else if($role == 'customer'){
          $this->model->insert_complaint();
        }
        else if($role == 'owner'){
            $this->view->to_owner = $this->model->complaints_owner();
        }
        $this->view->renderModule('feedback','complaints');
    }
    public function feedback(){
          $role = Session::get('role');
        if($role == 'admin'){
            $this->view->to_admin = $this->model->complaints_admin();
        }
        else if($role == 'customer'){
          $this->model->insert_complaint();
        }
        else if($role == 'owner'){
            $this->view->to_owner = $this->model->complaints_owner();
        }
        
        $this->view->renderModule('feedback','feedback');
    }
    public function wish_mail(){
        $this->view->renderModule('feedback','wish-mail');
    }

}
?>
