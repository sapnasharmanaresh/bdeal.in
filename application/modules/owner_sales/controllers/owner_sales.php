<?php

class Owner_sales  extends Controller{

    function __construct() {
        parent::__construct();
         @Session::init();

        if (Session::get('loggedIn')) {
            
        } else {
            header('Location:' . BASEURL . 'user/login');

            exit;
        }
     
       // echo Hash::create('sha256','bdeal',HASH_PASSWORD_KEY);
       $this->loadModel('owner_sales');
    }
    
    
    public function header($title){
        Modules::run('header','emp',array($title));
        $this->shopId();
        $this->view->renderModule('owner_sales','navigation');
    }
    public function dashboard(){
      $this->header('Owner Sales');
         $this->userGraph();
        $this->visitors();
        $this->view->renderModule('owner_sales', 'home');
         
    }
     public function userGraph() {
        $this->view->myData = $this->model->userGraph();
     
    }

    public function visitors() {
        $this->view->visitorsData = $this->model->visitors();
    
    }
    public function shopId(){
       $shop_id = $this->model->shopId();
        Session::set('shop_id',$shop_id);
        }
  
    public function logout(){
          Session::destroy();
        header('Location:' . BASEURL);
    }
    
    public function shopsDetail(){
        $this->header('Shop Detail');
        $this->view->module = 'shop';
        $this->view->file = 'detail';
        $this->view->renderModule('owner_sales','template');
    } 
    
  
    public function orders(){
        $this->header('Order Details');
         $this->view->module = 'orders';
        $this->view->file = 'owner_order_list';
        $this->view->renderModule('owner_sales','template');
       
    }
    
    public function productList(){
          $this->header('Product List');
        $this->view->module = 'product';
        $this->view->file = 'owner_product_list';
        $this->view->renderModule('owner_sales', 'template');
    }
}
?>
