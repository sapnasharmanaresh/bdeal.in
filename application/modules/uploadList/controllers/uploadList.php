<?php

class UploadList extends Controller {

    function __construct() {
        parent::__construct();
        $this->loadModel('uploadList');
    }

    public function upload($filename) {
        echo $filename;
        $this->model->upload($filename);
    }

    public function prod_list($filename,$id){
       echo $filename;
      $this->model->prod_list($filename,$id);
    }
}

?>