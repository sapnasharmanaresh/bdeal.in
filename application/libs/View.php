<?php

class View {

    function __construct() {
        //echo "viewjiukgfhnfd";
      //echo MODULE.'login'."/views/" .'login' . ".php";
        
    }
    public function renderMain($name){
        require "application/views/".$name.".php";
    }
    public function renderModule($module,$name){
       //echo "rendermodule";
        require MODULE.$module."/views/" . $name . ".php";
       
    }

}
?>
