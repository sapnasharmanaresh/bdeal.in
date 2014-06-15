<?php

class Salary extends Controller {

    function __construct() {
        parent::__construct();
        $this->loadModel('salary');
    }

    public function getSalaryAmount(){
        $role = Session::get('role');
      $this->view->salary =  $this->model->getSalaryAmount($role);
      $this->view->renderModule('salary','v-salary');
    }
    public function giveSalary(){
        Modules::run('account','transaction');
    }
    
    public function setSalaryAmount($role){
        $this->view->role = $role;
        $this->view->result = $this->model->setSalary();
        $this->view->renderModule('salary','setSalary');
    }
}
