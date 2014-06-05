<?php

class Mdl_stock extends Model {

    function __construct() {
        parent::__construct();
    }
    
    public function newStock(){
        $stock = $this->db->select('SELECT stock.*,shop.shop_name,sum(product.quantity) as quantity,category.category_name as categories FROM `product`,`shop`,`category`,`stock` where stock.stock_id=product.stock_id and product.shop_id=shop.shop_id and shop.shop_id=stock.shop_id');
        return $stock;
        
    }
    
    public function shopStock(){
        $shop_id = Session::get('shop_id');
        $shopStock = $this->db->select("SELECT * FROM stock,vendor where stock.vendor_id = vendor.vendor_id and stock.shop_id='$shop_id'");
        return $shopStock;
        
    }

}