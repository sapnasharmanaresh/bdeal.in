<?php

class Admin extends Controller {

    public function __construct() {
        parent::__construct();
        Session::init();

        if (Session::get('loggedIn')) {
            
        } else {
            header('Location:' . BASEURL . 'user/login');

            exit;
        }
        $this->loadModel('admin');
    }

    public function adminHeader($title) {
        Modules::run('header', 'admin', array($title));
        $this->view->renderModule('admin', 'navigation');
    }

    public function dashboard() {
        $this->adminHeader('Admin');
        $this->userGraph();
        $this->visitors();
        $this->view->renderModule('admin', 'home');
    }

    public function run() {
        $this->model->run();
    }

    public function ownership() {
        $this->adminHeader('Ownership Request');
        $this->view->module = 'ownerRequest';
        $this->view->file = 'admin';
        $this->view->renderModule('admin', 'template');
        //  Modules::run('ownerRequest', 'admin');
    }

    public function department($name) {
        $this->adminHeader(ucfirst($name) . 'Department');
        if ($name == 'sales') {
            $this->view->module = 'sales';
            $this->view->file = 'department';
        } elseif ($name == 'purchase') {
            $this->view->module = 'purchase';
            $this->view->file = 'department';
        } elseif ($name == 'quality') {
            $this->view->module = 'admin_quality';
            $this->view->file = 'department';
        } elseif ($name == 'accounts') {
            $this->view->module = 'account';
            $this->view->file = 'department';
        }

        $this->view->data = array('admin');
        $this->view->renderModule('admin', 'template');
        //       Modules::run('sales', 'admin');
    }

    public function logout() {
        Session::destroy();
        header('Location:' . BASEURL);
    }

    public function process() {
        $this->view->renderModule('ownerRequest', 'process');
    }

    public function status() {
        Modules::run('ownerRequest', 'status');
    }

    public function account_status() {
        Modules::run('user', 'account_status');
    }

    public function owner_new() {
        Modules::run('user', 'owner_new');
    }

    public function addEmployee($department) {
        $this->adminHeader('Add ' . ucfirst($department) . ' Employee');
        if ($department == 'quality') {
            $this->view->module = 'admin_quality';
            $this->view->file = 'add_emp';
            $this->view->data = array('admin');
        } elseif ($department == 'account') {
            $this->view->module = 'account';
            $this->view->file = 'add_emp';
            $this->view->data = array('admin');
        } elseif ($department == 'sales') {
            $this->view->module = 'sales';
            $this->view->file = 'add_emp';
            $this->view->data = array('admin');
        } elseif ($department == 'purchase') {
            $this->view->module = 'purchase';
            $this->view->file = 'add_emp';
            $this->view->data = array('admin');
        }

        $this->view->renderModule('admin', 'template');
    }

    public function checkSales() {
        $this->adminHeader('Sales Status');
        $this->view->module = 'sales';
        $this->view->file = 'salesStatus';
        $this->view->data = array('admin');
        $this->view->renderModule('admin', 'template');

        //    Modules::run('sales', 'salesStatus');
    }

    public function manageWelcomeNav() {

        $this->adminHeader('Manage Navigation');

        $this->view->module = 'topNav';
        $this->view->file = 'manageWelcomeNav';

        $this->view->renderModule('admin', 'template');
    }

    public function deleteMenu() {
        Modules::run('topNav', 'deleteMenu');
    }

    public function navList() {
        Modules::run('topNav', 'navList');
    }

    public function analysis() {
        $this->adminHeader('Analysis');
        $this->view->module = 'analysis';
        $this->view->file = 'visitors';
        $this->view->data = array('admin');
        $this->view->renderModule('admin', 'template');
    }

    public function actDetail() {
        $this->adminHeader('Account Detail');
        $this->view->module = 'account';
        $this->view->file = 'act_detail';
        $this->view->data = array('admin');
        $this->view->renderModule('admin', 'template');
        //  Modules::run('account', 'act_detail');
    }

    public function fullDetail() {
        $this->adminHeader('Admin account detail');
        $this->view->module = 'account';
        $this->view->file = 'full_act_detail';
        $this->view->data = array('admin');
        $this->view->renderModule('admin', 'template');
        //    Modules::run('account', 'full_act_detail');
    }

    public function notification() {
        $this->adminHeader('Admin | Notifications');
        $this->view->module = 'notification';
        $this->view->file = 'allNotifications';

        $this->view->renderModule('admin', 'template');
        //  Modules::run('notification', 'allNotifications');
    }

    public function employee($detail_id = null) {
        
        $this->adminHeader('Employee');
        $this->view->module = 'user';
        $this->view->file = 'employee';
        if ($detail_id != null) {
            $this->view->data = array($detail_id);
        }

        $this->view->renderModule('admin', 'template');
        // Modules::run('user', 'employee');
    }

    public function customer($detail_id=null) {
        $this->adminHeader('Customers');
            $this->view->module = 'user';
        $this->view->file = 'customer';
        if ($detail_id != null) {
            $this->view->data = array($detail_id);
        }

        $this->view->renderModule('admin', 'template');
        
    }

    public function owner($detail_id=null) {
        $this->adminHeader('Owner List');
            $this->view->module = 'user';
        $this->view->file = 'owner';
        if ($detail_id != null) {
            $this->view->data = array($detail_id);
        }

        $this->view->renderModule('admin', 'template');
      
    }

    public function advertisement() {
        $this->adminHeader('Advertisement');
        $this->view->module = 'advertisement';
        $this->view->file = 'admin_adver_request';
        // $this->view->data = array('admin');
        $this->view->renderModule('admin', 'template');
        //  Modules::run('advertisement', 'admin_adver_request');
    }

    public function mail() {
        $this->adminHeader("Mail");
        $this->view->module = 'mail';
        $this->view->file = 'mailPage';
        // $this->view->data = array('admin');
        $this->view->renderModule('admin', 'template');
    }

    public function complaints() {
        $this->adminHeader("Complaints");
        $this->view->module = 'feedback';
        $this->view->file = 'complaints';
        // $this->view->data = array('admin');
        $this->view->renderModule('admin', 'template');
      //  Modules::run('feedback', 'complaints');
    }

    public function feedback() {
        $this->adminHeader("Feedback");
        $this->view->module = 'feedback';
        $this->view->file = 'feedback';
        // $this->view->data = array('admin');
        $this->view->renderModule('admin', 'template');
     //   Modules::run('feedback', 'feedback');
    }

    public function userGraph() {
        $this->view->myData = $this->model->userGraph();
    }

    public function visitors() {
        $this->view->visitorsData = $this->model->visitors();
    }

    public function settings($type) {
        $this->adminHeader('Settings');
        $this->view->module = 'settings';
        $this->view->file = 'admin';
        $this->view->data = array($type);
        $this->view->renderModule('admin', 'template');
        //Modules::run('settings', 'admin', array($type));
    }

    public function newStock() {
        $this->adminHeader("New Stock");
        $this->view->module = 'purchase';
        $this->view->file = 'newStock';
        $this->view->renderModule('admin', 'template');
        // Modules::run('purchase', 'newStock');
    }

    public function salaries() {
        $this->adminHeader("Employee Salaries");
        $this->view->module = 'salary';
        $this->view->file = 'setSalaryAmount';
        $this->view->data = array('admin');
        $this->view->renderModule('admin', 'template');
        //     Modules::run('salary', 'setSalaryAmount');
    }

    public function profile() {
        $this->adminHeader("Profile Details");
        $this->view->module = 'profile';
        $this->view->file = 'profile_detail';
        $this->view->renderModule('admin', 'template');
        //Modules::run('profile','profile_detail');
    }

    public function interact() {
        $this->adminHeader("Chat");
        $this->view->module = 'chat';
        $this->view->file = 'chatstart';
        $this->view->renderModule('admin', 'template');
    }

    public function chat() {
        Modules::run('chat', 'getchat');
    }

    public function rates() {
        $this->adminHeader("Chat");
        $this->view->module = 'rates';
        $this->view->file = 'rates_detail';
        $this->view->renderModule('admin', 'template');
    }

    public function createMail() {
        $this->adminHeader('Create New Mail');
        $this->view->module = 'mail';
        $this->view->file = 'create_mail';
        $this->view->renderModule('admin', 'template');
    }

    public function sendMail() {
        $this->adminHeader('Send Mail');

        $this->view->module = 'mail';
        $this->view->file = 'send_mail';
        $this->view->renderModule('admin', 'template');
    }

}

?>
