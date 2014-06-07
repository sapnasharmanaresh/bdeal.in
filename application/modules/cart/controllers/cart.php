<?php

class Cart extends Controller {

    public function __construct() {
        parent::__construct();
       @ Session::init();
        $this->loadModel('cart');
   
    }

    public function cartCount(){
       
       echo $this->model->cartCount();
    }
    public function cart($user_id) {
        $this->view->cart = $this->model->cart($user_id);
        $this->view->renderModule('cart', 'view-cart');
    }

    public function update_cart() {
        
    }

    public function deleteFromCart() {
        
    }

    public function addToCart() {
          if(!isset($_SESSION['loggedIn'])){
            echo '1';
        }
        else{
        $this->model->addToCart();
    }
    }

    public function updateQuantity() {
        $this->model->updateQuantity();
    }

}

?>
