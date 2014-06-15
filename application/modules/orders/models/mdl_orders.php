<?php
class Mdl_orders extends Model{

    function __construct() {
        parent::__construct();
    }
    public function owner_order_list(){
        $shop_id = Session::get('shop_id');

        $res = $this->db->select("SELECT * From orders where shop_id='$shop_id'");
//        print_r($res);
        return $res;
        }
    
    public function shop_order_list(){
        
    }
    
    public function complete_order_list(){
     //   $this-db->select("SELECT orders")
    }
    
    public function salesStatus(){
        $sales = $this->db->select("SELECT orders.*,user.username as client_name,shop.shop_name FROM orders,user,shop where orders.status='delivered' and orders.user_id=user.id and shop.shop_id=orders.shop_id");
        return $sales;
    }
    
    public function mallCurrentOrders(){
		$orders = $this->db->select("SELECT * FROM `order-detail`,orders LEFT JOIN shop on shop.shop_id=orders.shop_id where orders.status!='delivered' and orders.order_id=`order-detail`.order_id");
		return $orders;
	}
	
	public function mallPastOrders(){
		
			$orders = $this->db->select("SELECT * FROM `order-detail`,orders LEFT JOIN shop on shop.shop_id=orders.shop_id where orders.status='delivered' and orders.order_id=`order-detail`.order_id");
		return $orders;
	
	}

}
?>
