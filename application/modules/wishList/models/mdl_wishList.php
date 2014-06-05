<?php

class Mdl_wishList extends Model {

    function __construct() {
        parent::__construct();
    }
    public function wishList($user_id){
        $list = $this->db->select("SELECT *  FROM wishlist where user_id='$user_id'");
        return $list;
        
    }

    public function addToList(){
       $product_id = $_POST['product_id'];
        $user_id = Session::get('user_id');
       
            $product_exist = $this->db->select("SELECT * FROM `wishlist` where user_id = '$user_id' and product_id='$product_id'");
            print_r($product_exist);
          
           if (count($product_exist) > 0) {
                 } else {
                $this->db->insert('`wishlist`', array(
                    'user_id'=>$user_id,
                    'product_id' => $product_id,
                  
                        ));
            }
       

            }
            
            
    public function listCount() {
        $user_id = Session::get('user_id');
        $count = $this->db->select("select count(*) as total from wishlist where user_id = '$user_id'");
       if(count($count)>0){
        return $count[0]['total'];
    }
    else{
        return '0';
    }
    }
}