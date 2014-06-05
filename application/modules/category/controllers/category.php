<?php

class Category extends Controller {

    function __construct() {
        parent::__construct();
        $this->loadModel('category');
    }
    
    public function listCategory(){
        $this->view->catList = $this->model->listCategory();
        $this->view->renderModule('category','category_list');
        
    }
    
    public function addCategory(){
       echo $this->model->addCategory();
    }

}
?>
