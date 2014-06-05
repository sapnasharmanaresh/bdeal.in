<?php

class Salary extends Controller {

    function __construct() {
        
    }

    public function getSalaryAmount(){
        $this->model->getSalaryAmount();
    }
    public function giveSalary(){
        Modules::run('account','transaction');
    }
}
