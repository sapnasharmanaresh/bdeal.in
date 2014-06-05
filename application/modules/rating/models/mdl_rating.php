<?php

class Mdl_rating extends Model {

    function __construct() {
        parent::__construct();
    }

    public function get_rating($product_id) {
        //$product_id=
        $rate = $this->db->select("SELECT avg_stars from product where product_id='$product_id'");
        return $rate[0]['avg_stars'];
    }

    public function set_rating() {
        //   $product_id=;
        //   $stars=;
        $this->db->insert('rating-detail', array(
            'product_id' => $product_id,
            'stars' => $stars,
            'date' => date('Y-m-d')
        ));
    }
    
    public function updateAverage(){
        //UPDATE star_rating_averages 
	//					SET avg_stars = ROUND((avg_stars * total_votes + $diff) / total_votes, 2)
	//					WHERE page = '$id' LIMIT 1
    }

}
