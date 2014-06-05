<?php
class Subcategory extends Controller {

    function __construct() {
        parent::__construct();
        $this->loadModel('subCategory');
    }
    
    public function selectSubCat(){
        $this->view->subCatList = $this->model->selectSubCat();
        $this->view->renderModule('subCategory','selectSubCategory');
    }
    
    public function addSubCategory(){
       echo $this->model->addSubCategory();
    }
    

}
?>
