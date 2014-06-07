<?php

/*
 * Main class to check about all the information about user
 */

class User extends Controller {

    public function __construct() {
        parent::__construct();
        $this->loadModel('user');
    }

    public function login() {
        Modules::run('template','templateHeader',array('Login'));
       
        if (isset($_POST['submit'])) {
           $this->view->msg = $this->model->run();
        }
         $this->view->renderModule('user', 'login');
        Modules::run('template','templateFooter');
    }
    
    public function register(){
     
     
        $this->view->renderModule('user', 'customerRegister');
        if (isset($_POST['signup'])) {
          $this->model->signup();
        }
    }

    public function admin() {
        $this->view->renderModule('user', 'admin');
    }

    public function user_dashboard() {
        $this->view->renderModule('user', 'user-dashboard');
    }

    public function owner_new() {
        //   echo "user";
        $id = $_POST['id'];
        $this->model->owner_new();
    }

    public function add_emp() {

        if (isset($_POST['add'])) {
            $msg = $this->model->add_emp();
            if ($msg == "exists") {

                $this->view->msg = "Email already exists";
            } else {
                $this->view->msg = "You have successfully added new employee.<a href='?click=1'>Add another</a>";
            }
        }
        $this->view->renderModule('user', 'add_emp');
    }

    public function add_admin_quality() {
        $this->view->role = 'admin_quality';
        $this->add_emp();
    }

    public function add_admin_account() {
        $this->view->role = 'admin_act';
        //    $this->view->page = 'add_admin_account';
        $this->add_emp();
    }

    public function add_admin_purchase() {
        $this->view->role = 'admin_purchase';
        $this->add_emp();
    }

    public function add_admin_sales() {
        $this->view->role = 'admin_sales';
        $this->add_emp();
    }
    
      public function add_owner_quality() {
        $this->view->role = 'owner_quality';
        $this->add_emp();
    }

    public function add_owner_account() {
        $this->view->role = 'owner_act';
        //    $this->view->page = 'add_admin_account';
        $this->add_emp();
    }

    public function add_owner_purchase() {
        $this->view->role = 'owner_purchase';
        $this->add_emp();
    }

    public function add_owner_sales() {
        $this->view->role = 'owner_sales';
        $this->add_emp();
    }

    public function employee($detail_id=null) {

        if ($detail_id !=null) {

            $this->view->detail = $this->model->detail($detail_id);
        }
        $this->view->res = $this->model->employee();
        $this->view->renderModule('user', 'admin_user_employee');
    }

    public function customer() {
          if (isset($_GET['id'])) {

            $this->view->detail = $this->model->detail();
        }
        $this->view->res = $this->model->customer();
        $this->view->renderModule('user', 'admin_user_customer');
    }

    public function owner() {
         if (isset($_GET['id'])) {

            $this->view->detail = $this->model->detail();
        }
        $this->view->res = $this->model->owner();
        $this->view->renderModule('user', 'admin_user_owner');
    }

    public function owner_emp() {
        Modules::run('header','owner',array('Employee'));
        $this->view->emp = $this->model->owner_emp();
        $this->view->renderModule('user', 'owner_emp');
    }

    public function owner_customer() {
       $this->view->res = $this->model->owner_customer();
        $this->view->renderModule('user', 'owner_customer');
    }

    public function account_status() {
        $this->model->account_status();
    }
    
   

}

?>
