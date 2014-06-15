<?php

class PriceAlert extends Controller {

    function __construct() {
        parent::__construct();
        $this->loadModel('pricealert');
    }
    
    public function setPriceAlert($product_id){
   if(isset($_POST['setalert'])){
        if(!isset($_SESSION['loggedIn'])){
            echo "<script>alert('Kindly login to set price alert')</script>";
        }
      
        else{
        
        $this->model->setPriceAlert($product_id);
        
        }
        }
        $this->view->renderModule('priceAlert','vPriceAlert');
    }
    
    public function sendPriceAlertMail(){
        
    }

}
