<?php
class Advertisement extends Controller {

    function __construct() {
        parent::__construct();
        $this->loadModel('advertisement');
    }
    
    public function owner_adver($user_id){
        $this->model->owner_adver();
     //   echo "owner_adver";
          $this->view->renderModule('advertisement','owner_advertisement_request');
        $this->pastRecords($user_id);
            
    }

    public function current_rates(){
       $this->view->rate =   $this->model->current_rates();
       $this->view->renderModule('advertisement','current_rates');
       
    }
    
    public function owner_adver_send(){
      
        
    }
    
    public function admin_adver_request(){
        $this->view->res  = $this->model->admin_adver_request();
        $this->view->renderModule('advertisement','admin_adver_request');
        
    }
    
    public function quality_adver_confirmation(){
         $this->view->res  = $this->model->quality_adver_confirmation();
          $this->view->renderModule('advertisement','quality_adver_confirmation');
    }
    
    public function quality_adver_con(){
        $this->model->quality_adver_con();
    }
    
    public function pastRecords($user_id){
        $this->view->res = $this->model->pastRecords($user_id);
        $this->view->renderModule('advertisement','past_records');
    }
    
    public function welcomePage(){
        $this->view->adver = $this->model->welcomePageAdver();
        $this->view->renderModule('advertisement','welcome_page');
    }
    
    public function shopAdver(){
        $this->view->renderModule('advertisement','welcome_page');
    }
}

