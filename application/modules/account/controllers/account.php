<?php

class Account extends Controller {

    function __construct() {
        @Session::init();
        parent::__construct();
        $this->loadModel('account');
    }

    
    public function department($role) {
        if($role == 'admin'){
            $this->view->renderModule('account', 'adminAccountDept');
        }
        else{
            $this->view->renderModule('account', 'ownerAccountDept');
        }
        
    }

  
    function add_emp($role) {

        if ($role == 'admin') {
            Modules::run('user', 'add_admin_account');
        } else {
            Modules::run('user', 'add_owner_account');
        }
    }

    public function act_detail($role) {
        if ($role == 'admin') {
            Modules::run('admin_act', 'total_amount');
        } else {
            Modules::run('owner_act', 'total_amount');
        }
    }

    public function full_act_detail($role) {
        if ($role == 'admin') {
            Modules::run('admin_act', 'detail');
        } else {
            Modules::run('owner_act', 'detail');
        }
    }

    public function header($title) {
        Modules::run('header', 'emp', array($title));
    }

    public function home() {

        $role = Session::get('role');
        if ($role == 'admin_act') {
            $this->header('Admin Accounts');
            $this->view->renderModule('account', 'admin_nav');
            $this->view->renderModule('account', 'admin_home');
        } else {
            $this->header('Owner Accounts');
            $this->view->renderModule('account', 'owner_nav');
            $this->view->renderModule('account', 'owner_home');
        }
    }

    public function transactions($userid) {
        $this->model->transactions;
    }

    public function interaction($userid) {
        Modules::run('chat','');
    }
    
    public function salary(){
        Modules::run('salary','salary');
    }
    
    public function shopDetails(){
        Modules::run('shop','details');
    }
    
    public function email(){
        Modules::run('mail','');
    }
    
   public function analysis(){
       Modules::run('analysis','');
   }

   public function settings(){
       Modules::run('settings','');
   }
   
   public function logout(){
       
   }
}

?>
