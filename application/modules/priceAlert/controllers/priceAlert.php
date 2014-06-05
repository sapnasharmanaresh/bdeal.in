<?php

class PriceAlert extends Controller {

    function __construct() {
        parent::__construct();
        $this->loadModel('pricealert');
    }
    
    public function setPriceAlert(){
        $this->model->setPriceAlert();
        $this->view->renderModule('pricealert','vpricealert');
    }
    public function sendPriceAlertMail(){
        
    }

}