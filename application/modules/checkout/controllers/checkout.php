<?php
class Checkout extends Controller {

    function __construct() {
        
    }
    
    public function paypal(){
        $this->view->renderModule('checkout','paypal');
    }
    
    public function braintree(){
        $this->view->renderModule('checkout','braintree');
    }

}