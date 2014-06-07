<?php

class Mdl_desc extends Model {

    function __construct() {
        parent::__construct();
    }
    
    public function get($page,$shop_id){
        $val = $this->db->select("SELECT * FROM pages");
        foreach($val as $key=>$value){
            $p = $key[$page];
        }
        return $p;
        
    }

}
?>
