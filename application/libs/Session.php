<?php

class Session {

    function __construct() {
        
    }
    public static function  init()
    {
        session_start();
    }
    public static function set($key,$value){
        $_SESSION[$key] = $value;
    }
    public static  function get($key){
       return $_SESSION[$key];
    }
    public static function destroy(){
        //echo $_SESSION['username']; 
        unset($_SESSION);
        session_destroy();
        //echo "destroy";
        
    }
 
}
?>
