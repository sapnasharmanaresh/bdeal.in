<?php
class User_guide extends Controller {

    function __construct() {
        parent::__construct();
    }
    
    public function header($title){
        Modules::run('header','welcome',array($title));
        $this->view->renderModule('user_guide','components/navigation');
    }
    
    public function home(){
        $this->header('Welcome to Bdeal Docs');
        $this->view->module = 'user_guide';
        $this->view->file = 'guide_home';
        $this->view->renderModule('user_guide','template');
    }
    
    public function guide_home(){
          $this->view->renderModule('user_guide','home');
    }
    
    public function employees(){
             $this->header('Developers docs');
        $this->view->renderModule('user_guide','employees/home');
        
    }
    public function admin($file = false){
        if($file==false){
        $f = 'admin/admin';
        }
        else{
            $f = 'admin/home/'.$file;
        }
       $this->header('Admin Docs');
       //$this->view->module = 'user_guide';
 //      $this->view->renderModule('user_guide',$f);
       $this->view->module = 'user_guide';
       $this->view->file = 'admin_home';
       $this->view->moduleNav = 'user_guide';
        $this->view->fileNav = 'admin_navigation';
        $this->view->renderModule('user_guide','template');
   
    }
    
    public function admin_home(){
             $this->view->renderModule('user_guide','admin/admin');
    }
    public function customer($file = false){
          if($file==false){
        $f = 'customer/customer';
        }
        else{
            $f = 'customer/home/'.$file;
        }
       $this->header('Customer Docs');
       //$this->view->module = 'user_guide';
       $this->view->renderModule('user_guide',$f);
       $this->view->moduleNav = 'user_guide';
        $this->view->fileNav = 'customer_navigation';
        $this->view->renderModule('user_guide','template');
    }
    public function admin_navigation(){
        $this->view->renderModule('user_guide','admin/navigation');
    }
      public function customer_navigation(){
        $this->view->renderModule('user_guide','customer/navigation');
    }
    public function developers(){
        $this->header('Developers docs');
        $this->view->renderModule('user_guide','developers/home');
    }
    public function owners(){
             $this->header('Developers docs');
        $this->view->renderModule('user_guide','owner/home');
    }

}