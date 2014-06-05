<?php

class Analysis extends Controller{

    function __construct() {
        parent::__construct();
        $this->loadModel('analysis');
    }
    
    public function visitors($role){
       if($role == 'admin'){
        $this->model->visitors($role);
        $this->view->renderModule('analysis','visitor');
    }
    else{
        $this->model->visitors($role);
        $this->view->renderModule('analysis','visitor');
    }
    }
    public function shop_sales_analysis(){
        
    }
    public function mall_sales_analysis(){
        
    }
    
    
}