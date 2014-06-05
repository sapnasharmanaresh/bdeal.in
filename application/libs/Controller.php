<?php

class Controller {

    function __construct() {
        $this->view = new View();
        //echo "controlelr";
    }

    function loadMainModel($name) {
        if ($module == false) {
            $path = 'models/mdl_' . $name . '.php';
            if (file_exists($path)) {
                require_once 'models/mdl_' . $name . '.php';
                $model = 'mdl_' . $name;
                $this->model = new $model();
            }
        }
    }
       function loadModel($name){
           
            $path=MODULE.$name."/models/mdl_".$name.".php";
            //echo $path;
            if(file_exists($path)){
                require_once MODULE.$name."/models/mdl_".$name.".php";
                $model = 'mdl_'.$name;
                $this->model = new $model();
                //echo "heyoooooooo";
            }
        }
    }



//$controller = new Controller();
?>
