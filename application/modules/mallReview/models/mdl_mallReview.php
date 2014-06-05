<?php

class Mdl_productReview extends Model{

    function __construct() {
        parent::__construct();
    }
    public function writeReview(){
        $this->db->insert('mallreview',array(
            
            'user_id'=>user_id,
            'reviewHead'=>$heading,
            'review'=>$content,
            'timestamp'=>date('Y-m-d H-i-s')
        ));
    } 
    public function totalReviews(){
        $this->db->select("SELECT count(*) FROM mallreview");
    }
    public function getReview(){
         $this->db->select("SELECT * FROM mallreview");
    }
    public function updateReview(){
        $this->db->update('mallreview',array(
            'reviewHead'=>$new_head,
            'review'=>$new_content,
            'timestamp'=>date('Y-m-d H-i-s')
        ),"user_id='$user_id'");
    }
    public function deleteReview(){
        $this->db->delete('mallreview',"user_id='$user_id'");
    } 

}