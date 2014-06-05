<?php

class Model {

    function __construct() {
        require 'application/config/database.php';
        $this->db = new Database($dbbase,$dbhost,$dbname,$dbuser,$dbpass);
    }
    
    
}

?>