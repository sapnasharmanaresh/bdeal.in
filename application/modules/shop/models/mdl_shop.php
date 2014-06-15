<?php

class Mdl_shop extends Model {

    function __construct() {
        parent::__construct();
    }

    public function productsInShop($shop_id) {


        $products = $this->db->select("SELECT product.*,detail.*,category.category_name,subcategory.subcategory,shop.* 
                                   FROM product 
                                                 LEFT JOIN category ON
                                                      category.`category_id` = product.`category_id` 
                                                 LEFT JOIN subcategory 
                                                      ON category.`category_id` = subcategory.`category_id` 
                                                         and product.`subcategory_id`=subcategory.id 
                                                 LEFT JOIN shop
                                                      ON shop.`shop_id` = product.`shop_id`
                                                         
                                                 LEFT OUTER JOIN `product-detail` as detail
                                                      ON product.`product_id` = detail.`product_id`
                                                        where shop.shop_id='$shop_id'");
        return $products;
    }

    public function shop_list() {
        $shop = $this->db->select("SELECT shop.*,orders.*,user.username as owner_name FROM shop
                LEFT JOIN orders on orders.shop_id = shop.`shop_id` LEFT JOIN user on user.id=shop.owner_id ");
        // print_r($shop);
        return $shop;

        //$this->db->select("SELECT count(*) from ");
    }

    public function shopName($owner_id) {
        $res = $this->db->select("SELECT * FROM shop where owner_id='$owner_id'");
        $_SESSION['shop_name'] = $res[0]['shop_name'];
        $_SESSION['shop_id'] = $res[0]['shop_id'];
    }

    public function shopId($shop_name) {
        $id = $this->db->select("SELECT shop_id from shop where shop_name='$shop_name'");
        return $id[0]['shop_id'];
    }

    public function shop($shop_id) {
        $shopDetail = $this->db->select("SELECT * FROM shop LEFT JOIN `user-detail` on `user-detail`.`user_id`=shop.owner_id where shop.shop_id = '$shop_id' ");
        return $shopDetail;
    }

    public function shop_detail() {
        $shop = $this->db->select("SELECT shop.*,shop.description as shop_desc ,orders.*,user.username as owner_name,detail.*,product.*,proddetail.*,vendor.*,us.username as customer_name
				FROM shop
                LEFT JOIN orders on orders.shop_id = shop.`shop_id`
              LEFT JOIN user as us on us.id=orders.user_id 
                LEFT JOIN user on user.id=shop.owner_id
               LEFT JOIN `order-detail` as detail on detail.order_id=orders.order_id 
              LEFT JOIN product on product.product_id=detail.product_id
             LEFT JOIN `product-detail` as proddetail on proddetail.product_id=product.product_id 
            LEFT JOIN stock on stock.stock_id=product.stock_id
           LEFT JOIN vendor on vendor.vendor_id=stock.vendor_id ");
        // print_r($shop);
        return $shop;
    }

    public function subcategory_list($name) {
        $subcat = $this->db->select("SELECT * FROM subcategory where category_id=(SELECT category_id from category where category_name='$name')");
        return $subcat;
    }

}

