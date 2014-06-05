<?php
class Reviews extends Controller{

    function __construct() {
        parent::__construct();
        $this->loadModel('reviews');
        @Session::init();
    }
    
    public function writeReview($product_id){
        $this->view->prod_id = $product_id;
        $this->view->renderModule('reviews','write-review');
    }
    public function totalReviews(){
     echo  $this->model->totalReviews();
    }
    
    public function addReview(){
        echo "dfasd";
        $this->model->addReview();
    }
    
    public function showReviews(){
        $this->view->reviews = $this->model->showReviews();
        $this->view->renderModule('reviews','showReviews');
        
    }
    public function getCustomerReviews(){
        $this->view->customerReviews = $this->model->getCustomerReviews();
        $this->view->renderModule('reviews','customerReviews');
    }

}