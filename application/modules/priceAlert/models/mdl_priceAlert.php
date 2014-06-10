<?php

class Mdl_priceAlert extends Model {

    function __construct() {
        parent::__construct();
    }
    
    public function setPriceAlert($product_id){
        if(isset($_POST['setalert'])){
            $lvalue = $_POST['lvalue'];
            $uvalue=$_POST['uvalue'];
        $this->db->insert('pricealert',array(
           'user_id'=>Session::get('user_id'),
            'product_id'=>$product_id,
            'lower_value'=>$lvalue,
            'upper_value'=>$uvalue,
            'timestamp'=>date('Y-m-d H:i:s')
        ));
    } 
    }
}