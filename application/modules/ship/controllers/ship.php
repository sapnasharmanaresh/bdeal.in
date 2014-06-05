<?php

class Ship extends Controller {

    function __construct() {
        parent::__construct();
        $this->loadModel('ship');
    }
    public function shipping_status(){
        $this->view->renderModule('ship','shipping_status');
    }

}
?>
