<?php
class Visitors extends Controller{

    function __construct() {
       $this->loadModel('visitors');
      // echo "visitors";
    }
    
    function prev(){
        $this->model->prev();
    }
    
    function update(){
      
        $this->model->update();
    }

}
