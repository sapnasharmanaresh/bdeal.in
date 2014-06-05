<?php

class Desc extends Controller {

    function __construct() {
        echo 'fdfa';
        die;
        parent::__construct();
        $this->loadModel('desc');
        
    }
    
    public function desc($page){
        if($page == 'aboutus'){
           //
        }
    }
    public function aboutus(){
     $p = $this->model->get('aboutus');
     
     $file = BASEURL.DESCRIPTION.$p;
     $f = fopen($file,'r');
     echo fread($f,filesize($file));
     fclose($f);
     
    }

}
?>
