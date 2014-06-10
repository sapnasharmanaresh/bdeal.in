<?php

class WishList extends Controller {

    function __construct() {
        parent::__construct();
        @Session::init();
        $this->loadModel('wishList','wishList');
    }
    public function wishList($user_id){
        
        $this->view->wishList =$this->model->wishList($user_id);
        $this->view->renderModule('wishList','vwishList');
    }
    public function addToList(){
     
        if(!isset($_SESSION['loggedIn'])){
            echo '1';
        }
        elseif($_SESSION['role'] != 'customer'){
            echo '2';
        }
        else{
        $this->model->addToList();
    }
    }
    
    public function listCount(){
     echo   $this->model->listCount();
    }

}