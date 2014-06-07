<?php
class Admin_Quality extends Controller{

    function __construct() {
        parent::__construct();
      
           @ Session::init();
      if(isset($_SESSION['loggedIn'])){
        }
        else{
            echo "Kindly login to access information ";
            header('Location:'.BASEURL.'user/login');
            exit;
        }
          $this->loadModel('quality');
        
    }

    public function header($title){
        Modules::run('header','emp',array($title));
        $this->view->renderModule('admin_quality','admin_navigation');
    }
   
    function ownerRequest(){
        $this->header("Owner Request");
        $this->view->module = 'ownerRequest';
        $this->view->file = 'quality_owner_request';
        $this->view->renderModule('admin_quality','template');
      // Modules::run('ownerRequest','quality_owner_request');
       
    }
    public function department($role){
        if($role == 'admin')
        $this->view->renderModule('admin_quality','adminQualityDept');
        
            
        
    }
    
    function add_emp(){
       Modules::run('user','add_admin_quality');
    }

    public function home(){
        //echo "heya";
      $this->header('Dashboard');
     
        $this->view->renderModule('admin_quality','admin_home');
   

    }
    
    public function advertisement(){
        $this->header('Advertisement Requests');
         $this->view->module = 'advertisement';
        $this->view->file = 'quality_adver_confirmation';
        $this->view->renderModule('admin_quality','template');
    }
    
    public function quality_adver_confirmation(){
        Modules::run('advertisement','quality_adver_con');
    }
    public function logout(){
        Session::destroy();
        header('Location:'.BASEURL);
    }

}
