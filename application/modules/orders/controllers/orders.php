
<?php
class Orders extends Controller{

    function __construct() {
        parent::__construct();
        $this->loadModel('orders');
    }
    public function owner_order_list(){
        $this->view->res =  $this->model->owner_order_list();
        $this->view->renderModule('orders','owner_order_list');
    }
    public function customer_order_list(){
        
    }
    
    public function shop_order_list(){
        $this->model->shop_order_list();
    }
    public function complete_order_list(){
        $this->model->complete_order_list();
    }
    
    public function mallCurrentOrders(){
       $this->view->res = $this->model->mallCurrentOrders();
       $this->view->renderModule('orders','mallOrders');
    }
    public function mallPastOrders(){
	 $this->view->res = $this->model->mallPastOrders();
       $this->view->renderModule('orders','mallOrders');
	}
    public function customerCurrentOrders(){
		
	}
    public function customerPastOrders(){
        
    }
    
    public function salesStatus(){
       $this->view->sales = $this->model->salesStatus();
       $this->view->renderModule('orders','totalSales');
       
    }
   

}
?>
