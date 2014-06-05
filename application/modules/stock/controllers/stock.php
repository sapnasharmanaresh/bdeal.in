<?php
class Stock extends Controller {

    function __construct() {
        parent::__construct();
        $this->loadModel('stock');
    }
    
    public function newStock(){
        $this->view->stock = $this->model->newStock();
        $this->view->renderModule('stock','newStock');
    }
    
    public function shopStock(){
       $this->view->shopStock =  $this->model->shopStock();
       $this->view->renderModule('stock','shopStock');
        
    }

}