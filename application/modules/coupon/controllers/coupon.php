<?php
class Coupon extends Controller {

    function __construct() {
        parent::__construct();
        $this->loadModel('coupon');
    }
    
    public function setCoupon(){
        $this->model->setCoupon();
         $this->view->renderModule('coupon','addNewCoupon');
    }
    
    public function apply_coupon(){
        
    }
    
    public function getCoupon(){
        $this->view->coupons = $this->model->getCoupon();
        $this->view->renderModule('coupon','v_coupon');
    }
    

}
