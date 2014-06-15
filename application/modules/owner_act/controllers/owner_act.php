<?php

class Owner_act  extends Controller{

    function __construct() {
        parent::__construct();
         @Session::init();

        if (Session::get('loggedIn')) {
            
        } else {
            header('Location:' . BASEURL . 'user/login');

            exit;
        }
     
       // echo Hash::create('sha256','bdeal',HASH_PASSWORD_KEY);
       $this->loadModel('owner_act');
    }
    
    public function header($title){
        Modules::run('header','emp',array($title));
        $this->view->renderModule('owner_act','navigation');
    }
    public function dashboard(){
      $this->header('Owner Accounts');
      $this->userGraph();
        $this->visitors();
           $this->view->renderModule('owner_act', 'home');
    }
    
     public function userGraph() {
        $this->view->myData = $this->model->userGraph();
     
    }

    public function visitors() {
        $this->view->visitorsData = $this->model->visitors();
    
    }
    
    public function total_amount(){
       $this->view->total = $this->model->total_amount();
        $this->view->renderModule('owner_act','total-amount');
    }
   
    public function detail(){
        $this->view->detail = $this->model->detail();
        $this->view->renderModule('owner_act','full-detail');
        
    }
    public function new_entry($email){
    //    echo $email;
        $this->model->new_entry($email);
    }
    
    public function owner_act(){
        $this->view->renderModule('owner_act','owner_account_home');
    }
    
    public function logout(){
          Session::destroy();
        header('Location:' . BASEURL);
    }
    
    public function shopsDetail(){
        $this->header('Shop Detail');
        $this->view->module = 'shop';
        $this->view->file = 'detail';
        $this->view->renderModule('owner_act','template');
    } 
    
    public function ownerAccount(){
          $this->header('owner Account Detail');
        $this->view->module = 'owner_act';
        $this->view->file = 'full-detail';
        $this->view->renderModule('owner_act','template');
    }

}
?>
