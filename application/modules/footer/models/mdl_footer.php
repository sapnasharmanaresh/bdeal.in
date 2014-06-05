<?php

class Mdl_footer extends Model {

    function __construct() {
        
    }
    
    public function shopFooter(){
        $shop_id = Session::get('shop_id');
        $shopFooter = $this->db->select("SELECT description from shop where shop_id='$shop_id'");
        return $shopFooter;
        
    }

}
?>
