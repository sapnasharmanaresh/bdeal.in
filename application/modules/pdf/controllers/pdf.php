<?php
class Pdf extends Controller {

    function __construct() {
        parent::__construct();
        $this->loadModel('pdf');
    }

    public function productDetail(){
     $this->view->detail = $this->model->productDetail();
        $this->view->renderModule('pdf','generate');
        
    }
    
    public function invoice(){
        $this->model->invoice();
    }
}
?>
