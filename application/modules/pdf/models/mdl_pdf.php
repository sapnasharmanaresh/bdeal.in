<?php
class Mdl_pdf extends Model {

    function __construct() {
        parent::__construct();
    }
    
   
    public function generate() {
        $product_id = $_GET['id'];
        $detail = $this->db->select("SELECT product.*,detail.*,category.category_name,subcategory.subcategory,shop.shop_name                                                       
                                                            FROM product 
               	LEFT JOIN category 
                ON category.category_id = product.category_id 
               LEFT JOIN subcategory 
               ON category.category_id = subcategory.category_id 
                and product.subcategory_id=subcategory.id 
                LEFT OUTER JOIN `product-detail` as detail 
               ON product.product_id = detail.product_id
				LEFT JOIN shop ON 
					product.shop_id=shop.shop_id
                 where product.product_id = '$product_id'");
        return $detail;
    }

}
?>
