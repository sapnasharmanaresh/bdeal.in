<?php

class Owner extends Controller {

    public function __construct() {
        parent::__construct();
        Session::init();
        if (isset($_SESSION['loggedIn'])) {
            
        } else {
            header('Location:' . BASEURL . 'user/login');
            exit;
        }
        parent::loadModel('owner', 'owner');
    }

    public function owner() {

        $this->header('Owner | Home');
        $this->view->renderModule('owner', 'owner');
        Modules::run('shop', 'ownerShopName');
    }

    public function header($title) {
        Modules::run('header', 'owner', array($title));
        $this->view->renderModule('owner', 'navigation');
    }

    public function run() {

        //echo "hrrrr";
        // $this->model->run();
    }

    public function department($name) {
        $this->header(ucfirst($name) . ' Department');
        if ($name == 'sales') {
            $this->view->module = 'sales';
            $this->view->file = 'department';
        } elseif ($name == 'purchase') {
            $this->view->module = 'purchase';
            $this->view->file = 'department';
        } elseif ($name == 'quality') {
            $this->view->module = 'quality';
            $this->view->file = 'department';
        } elseif ($name == 'accounts') {
            $this->view->module = 'account';
            $this->view->file = 'department';
        }

        $this->view->data = array('owner');
        $this->view->renderModule('owner', 'template');
        //       Modules::run('sales', 'admin');
    }
    
    public function addEmployee($department) {
        $this->header('Add ' . ucfirst($department) . ' Employee');
        if ($department == 'quality') {
            $this->view->module = 'quality';
            $this->view->file = 'add_emp';
         
        } elseif ($department == 'account') {
            $this->view->module = 'account';
            $this->view->file = 'add_emp';
          
        } elseif ($department == 'sales') {
            $this->view->module = 'sales';
            $this->view->file = 'add_emp';
        
        } elseif ($department == 'purchase') {
            $this->view->module = 'purchase';
            $this->view->file = 'add_emp';
 
        }
   $this->view->data = array('owner');
        $this->view->renderModule('owner', 'template');
    }

     public function actDetail() {
        $this->header('Account Detail');
        $this->view->module = 'account';
        $this->view->file = 'act_detail';
        $this->view->data = array('owner');
        $this->view->renderModule('owner', 'template');
        //  Modules::run('account', 'act_detail');
    }

    public function fullDetail() {
        $this->header('Owner account detail');
        $this->view->module = 'account';
        $this->view->file = 'full_act_detail';
        $this->view->data = array('owner');
        $this->view->renderModule('owner', 'template');
        //    Modules::run('account', 'full_act_detail');
    }
    
  public function checkSales() {
        $this->header('Sales Status');
        $this->view->module = 'sales';
        $this->view->file = 'salesStatus';

        $this->view->renderModule('owner', 'template');

        //    Modules::run('sales', 'salesStatus');
    }
    
      public function analysis() {
        $this->header('Analysis');
           $this->view->module = 'analysis';
        $this->view->file = 'visitors';
        $this->view->data = array('owner');
        $this->view->renderModule('owner', 'template');
     
    }
    public function logout() {
        $_SESSION['msg'] = "You have been successfully logged Out";
        Session::destroy();
        header('Location:' . BASEURL);
    }

    public function profile() {
        Modules::run('profile');
    }

    public function employee() {
        Modules::run('user', 'owner_emp');
    }

    public function advertisement() {
        $this->header('Advertisement Request');
        Modules::run('advertisement', 'owner_adver');
    }

    public function product_list() {
        $this->header('Product List');
        $this->view->module = 'product';
        $this->view->file = 'owner_product_list';
        $this->view->renderModule('product', 'template');
    }

    public function customer() {
        $this->header('Customer');
        Modules::run('user', 'owner_customer');
    }

    public function orders() {
        $this->header('Orders');
          $this->view->module = 'orders';
        $this->view->file = 'owner_order_list';
        $this->view->renderModule('product', 'template');
        
    }

    public function email() {
        Modules::run('mail', 'owner_mail');
    }

    public function coupon() {
        $this->header('Coupon');
        $this->view->module = 'coupon';
        $this->view->file = 'getCoupon';
        $this->view->renderModule('product', 'template');
        //  Modules::run('coupon', 'getCoupon');
    }

    public function addCoupon() {
        $this->header('Add Coupon');
        Modules::run('coupon', 'setCoupon');
    }

    public function shopNav() {
        $this->header('Shop Navigation');
        $this->view->module = 'shopNav';
        $this->view->file = 'home';
        $this->view->renderModule('product', 'template');
    }

    public function newProduct() {
        $this->header('Add Product');
        $this->view->module = 'product';
        $this->view->file = 'newProduct';
        $this->view->renderModule('product', 'template');
    }

    public function selectSubcat() {
        Modules::run('subcategory', 'selectSubCat');
    }

    public function complaints() {
        $this->header('Complaints');
        $this->view->module = 'feedback';
        $this->view->file = 'complaints';
        $this->view->renderModule('product', 'template');
    }

    public function feedback() {
        $this->header('Complaints');
        $this->view->module = 'feedback';
        $this->view->file = 'feedback';
        $this->view->renderModule('product', 'template');
    }

    public function settings($type) {
        $this->header('Settings');
        $this->view->module = 'settings';
        $this->view->file = 'owner';
        $this->view->data = array($type);
        $this->view->renderModule('product', 'template');
    }

    public function visitShop() {
        $shop_name = Session::get('shop_name');

        Modules::run('shop', 'shop', array($shop_name));
    }

    public function deleteMenu() {
        Modules::run('shopNav', 'deleteMenu');
    }

    public function submenus() {
        Modules::run('shopNav', 'subMenus');
    }

    public function addSubmenu() {
        Modules::run('shopNav', 'addSubmenu');
    }

    public function stock() {
        $this->header('Stock');
        $this->view->module = 'stock';
        $this->view->file = 'shopStock';

        $this->view->renderModule('product', 'template');
    }

    public function empSalary() {
        $this->header('Employee Salary');
        $this->view->module = 'salary';
        $this->view->file = 'getSalaryAmount';
        $this->view->renderModule('product', 'template');
    
        
    }
    public function set_mail(){
        Modules::run('mail','newTemplate');
    }
    
   public function send_mail(){
       Modules::run('mail','send_mail');
   }

}

?>