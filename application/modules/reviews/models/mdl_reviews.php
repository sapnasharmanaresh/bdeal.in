<?php

class Mdl_reviews extends Model {

    function __construct() {
        parent::__construct();
    }

    public function totalReviews() {
       $product_id = $_POST['product_id'];
       $count = $this->db->select("SELECT count(*) as total FROM productreview where product_id = '$product_id'");
       return $count[0]['total']; 
    }

    public function addReview() {
        $user_id = Session::get('user_id');
         $review = $_POST['review'];
        $reviewHead = $_POST['reviewHead'];
        $product_id = $_POST['product_id'];
        $this->db->insert('productreview', array(
            'product_id' => $product_id,
            'user_id'=>$user_id,
            'reviewHead'=>$reviewHead,
            'review'=>$review,
            'timestamp'=>date('Y-m-d h:i:s')
        ));
    }
 
   public function showReviews(){
       $product_id = $_POST['product_id'];
       $reviews = $this->db->select("SELECT * FROM productreview where product_id = '$product_id'");
       return $reviews;
   }
}