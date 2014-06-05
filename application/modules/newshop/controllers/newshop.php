<?php

class Newshop extends Controller {

    function __construct() {
        parent::__construct();
        $this->loadModel('newshop');
    }
    
    public function payment(){
        $this->view->res = $this->model->payment();
        $this->view->renderModule('newshop','payment');
    }

}
?>
