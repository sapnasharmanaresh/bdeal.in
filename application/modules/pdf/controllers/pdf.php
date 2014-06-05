<?php
class Pdf extends Controller {

    function __construct() {
        parent::__construct();
        $this->loadModel('pdf');
    }

    public function generate(){
     $this->view->detail = $this->model->generate();
        $this->view->renderModule('pdf','generate');
        
    }
}
?>
