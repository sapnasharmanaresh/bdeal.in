<?php

class Rating extends Controller {

    function __construct() {
       parent::__construct();
       $this->loadModel('rating');
    }

    public function get_rating($product_id){
      //  echo $product_id;
      echo $this->model->get_rating($product_id);
    } 
    public function set_rating(){
        $this->view->renderModule('rating','vrating');
    }
}