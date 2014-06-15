<?php

class Template extends Controller {

    function __construct() {
        parent::__construct();
    }

    /*
     * Here all the modules are joining to form a page
     */

    public function templateHeader($title) {
        Modules::run('header', 'welcome', array($title));
       $this->welcomeNav();
               
    }

    public function templateFooter() {
        Modules::run('footer', 'footer');
    }

    public function welcomeNav()
    {
         $this->view->renderModule('template', 'welcome-nav');
    }
    public function welcome() {
        $this->templateHeader('Welcome to Bdeal');
       
        $this->view->renderModule('template', 'welcome');
        $this->templateFooter();
    }

    function admin() {
        $this->view->renderModule('template', 'admin');
    }

    function customer() {
        $this->view->renderModule('template', 'customer');
    }

    function admin_act() {
        $this->view->renderModule('template', 'admin-act');
    }

    function admin_sales() {
        $this->view->renderModule('template', 'admin-sale');
    }

    function admin_purchase() {
        $this->view->renderModule('template', 'admin-purchase');
    }

    function owner() {
        $this->view->renderModule('template', 'owner');
    }

    function owner_purchase() {
        $this->view->renderModule('template', 'owner-purchase');
    }

    function owner_sales() {
        $this->view->renderModule('template', 'owner-sale');
    }

    function owner_act() {
        $this->view->renderModule('template', 'owner-act');
    }

    public function visitor() {
        Modules::run('visitors', 'visitors');
    }

    public function admin_quality() {
        $this->view->renderModule('template', 'admin_quality');
    }

}
?>

