<?php

class Product extends Controller {

    public function __construct() {
        //    echo "product";
        ob_start();
        @Session::init();
        parent::__construct();
        $this->loadModel('product');
    }

    public function index() {
        $this->view->style = array('style.css');
        $this->view->js = array('jquery.js', 'product.js');
    }

    public function productHeader($title) {
        Modules::run('template', 'templateHeader', array($title));
    }

    public function display_product() {
        $prod = $this->model->display_product();
        return $prod;
    }

    public function display_thumbnail() {
        //    echo "display";
        $this->view->prod = $this->display_product();
        $this->view->renderModule('product', 'product-thumbnail');
    }

    public function display_detail() {

        $this->view->detail = $this->model->display_detail();
//          print_r($this->view->detail);
        $title = $this->view->detail[0]['name'];
        $this->header($title);
        $this->view->module = 'product';
        $this->view->file = 'product_detail';


        $this->view->renderModule('product', 'template');
    }

    public function shop($name) {
        Modules::run('shops', 'shop', array($name));
    }

    public function category($cat_name, $subcat_name = false) {
        if ($subcat_name == false) {
            $this->header($cat_name . " | Detail");
            $this->view->cat = $cat_name;
            $this->view->subcat = $this->model->subcategory_list($cat_name);

            $this->view->renderModule('product', 'subcategory_list');
        } else {
            $this->header($subcat_name . " | Detail");

            $this->view->moduleSideBar = 'search';
            $this->view->fileSideBar = 'searchSidebar';
            $this->view->dataSideBar = array($cat_name, $subcat_name);
            $this->view->module = 'product';
            $this->view->file = 'prod_thumbnail';
            $this->view->data = array($cat_name, $subcat_name);
            $this->view->renderModule('product', 'template');
        }
        $this->footer();
    }

    public function prod_thumbnail($cat_name, $subcat_name) {
        $this->view->products = $this->model->product_list($cat_name, $subcat_name);
        $this->view->renderModule('product', 'prod_thumbnail');
    }

    public function header($title) {
        Modules::run('template', 'templateHeader', array($title));
        // Modules::run('search', 'searchSidebar');
    }

    public function product_detail() {
        $this->view->detail = $this->model->display_detail();
        $this->view->renderModule('product', 'product-detail');
    }

    public function footer() {
       Modules::run('footer','footer');
        
    }

    public function navigation() {
        $this->view->renderModule('product', 'navigation');
    }

    public function owner_product_list() {
        $this->view->res = $this->model->owner_product_list();
        $this->view->renderModule('product', 'owner_product_list');
    }

    public function addToCart($product_id) {
        Modules::run('cart', 'addToCart', array($product_id));
    }

    public function detail($menu_name) {

        $this->productHeader("Detail | $menu_name ");
        if ($menu_name == 'Home') {
            header('Location:' . BASEURL);
        } else if ($menu_name == 'Shops') {
          Modules::run('shop','shop_thumb');
         
        }
       
        else{
        $this->view->cat = $this->model->detail($menu_name);
        $this->view->renderModule('product', 'category_list');
        }
        $this->footer();
        
        }

    public function mailDesc() {
        $url = $_POST['url'];
        Modules::run('mail', 'productDescription', array($url));
    }

    public function newProduct() {
        if (isset($_POST['add'])) {
            $this->view->msg = $this->model->add_product();
        }
        if (isset($_POST['upload'])) {
            $filename = $this->model->uploadProduct();

            Modules::run('uploadList', 'upload', array($filename));
        }
        if (isset($_POST['addCategory'])) {

            Modules::run('category', 'addCategory');
        }
        if (isset($_POST['addSubCategory'])) {

            Modules::run('subCategory', 'addSubCategory');
        }
        $this->view->renderModule('product', 'addProduct');
    }

   
}

?>
