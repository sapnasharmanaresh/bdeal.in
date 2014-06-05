<?php

class Header extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->style = array('style.css');
        @ Session::init();
        $this->loadModel('header');
    }

    public function admin($title) {
        $this->view->js = array('admin/admin.js');
        $this->view->title = $title;
        $this->header();
        $this->logoBar100();
    }

    public function owner($title) {
        $this->view->js = array('owner/owner.js');
        $this->view->title = $title;
        $this->header();
        $this->logoBar100();
    }

    public function emp($title) {
        $this->view->js = array('emp/emp.js','ownerRequest/request.js','quality/quality.js');
        $this->view->title = $title;
        $this->header();
        $this->logoBar100();
    }

    public function customer($title) {
        $this->view->js = array('customer/customer.js');
        $this->view->title = $title;
        $this->header();
        $this->logoBar100();
    }

    public function welcome($title) {
        $this->view->js = array('bdeal/bdeal.js');
        $this->view->title = $title; //'vendor/jquery.js',
        $this->header();
        $this->logoBar80();
        Modules::run('search', 'searchBar');
        Modules::run('user', 'register');
    }

    public function shop($title) {
        $this->view->js = array('shop/shop.js');
        $this->view->title = $title;
        $this->header();
     //   Modules::run('shop', 'shopLogoBar',array($shop_name));
    }

    public function product($title) {
        $this->view->js = array('product/product.js');
        $this->view->title = $title;
        $this->header();
        $this->logoBar80();
    }

    public function ownerRequest($title) {
        $this->view->js = array('ownerrequest/request.js');
        $this->view->title = $title;
        $this->header();
        $this->logoBar80();
        Modules::run('search', 'searchBar');
        Modules::run('user', 'register');
    }

    public function header() {
        $this->getLogo();
        $this->view->renderModule('header', 'vHeader');
    }

    public function profile() {
        $this->view->renderModule('header', 'vProfile');
    }

    public function setLogo() {
       // echo "setlogo";
        $this->model->setLogo();
    }

    public function getLogo() {
        $this->view->src = $this->model->getLogo();
    }

    public function nav_link() {
        $this->view->renderModule('header', 'nav-link');
    }

    public function logoBar80() {
        $this->view->renderModule('header', 'logoBar80');
    }

    public function logoBar100() {
        $this->view->renderModule('header', 'logoBar100');
    }

}

?>
