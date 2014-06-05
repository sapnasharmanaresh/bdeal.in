<?php
class Mdl_sidebar extends Model {

    function __construct() {
        parent::__construct();
    }
    
    public function get_sidebar(){
        $cat = $this->db->select('SELECT category.category_name,subcategory.subcategory FROM category,subcategory where'
                . 'category.category_id=subcategory.subcategory_id');
        print_r($cat);
        return $cat;
    }

}