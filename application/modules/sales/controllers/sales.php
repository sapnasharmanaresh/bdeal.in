<?php

class Sales extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function department($role) {
        if ($role == 'admin') {
            $this->view->renderModule('sales', 'adminSalesDept');
        }
        else{
              $this->view->renderModule('sales', 'ownerSalesDept');
        }
    }

   

    function add_emp() {
        Modules::run('user', 'add_admin_sales');
    }

    public function all_orders() {
        Modules::run('orders', 'complete_order_list');
    }

    public function orders() {
        Modules::run('orders', 'shop_order_list');
    }

    public function analysis() {
        Modules::run('analysis', 'shop_sales_analysis');
    }

    public function complete_analysis() {
        Modules::run('analysis', 'mall_sales_analysis');
    }

    public function salesStatus($role) {
        if($role=='admin'){
        Modules::run('orders', 'salesStatus');
    }
    }

}

?>
