<?php

class Mdl_productReview extends Model{

    function __construct() {
        parent::__construct();
    }
    public function writeReview(){
        $this->db->insert('productreview',array(
            'product_id'=>$product_id,
            'user_id'=>user_id,
            'reviewHead'=>$heading,
            'review'=>$content,
            'timestamp'=>date('Y-m-d H-i-s')
        ));
    } 
    public function totalReviews(){
        $this->db->select("SELECT count(*) FROM productreview where product_id='$product_id'");
    }
    public function getReview(){
         $this->db->select("SELECT * FROM productreview where product_id='$product_id'");
    }
    public function updateReview(){
        $this->db->update('productreview',array(
            'reviewHead'=>$new_head,
            'review'=>$new_content,
            'timestamp'=>date('Y-m-d H-i-s')
        ),"product_id='$product_id' and user_id='$user_id'");
    }
    public function deleteReview(){
        $this->db->delete('productreview',"product_id='$product_id'");
    } 

}