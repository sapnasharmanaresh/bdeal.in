<?php

class Search extends Controller {

    function __construct() {
        parent::__construct();
        $this->loadModel('search');
    }

    public function employee() {
        $this->view->result = $this->model->employee();
        $this->view->renderModule('search', 'search_employee');
    }
     public function customer() {
        $this->view->result = $this->model->customer();
        $this->view->renderModule('search', 'search_customer');
    }
    public function  owner() {
        $this->view->result = $this->model->owner();
        $this->view->renderModule('search', 'search_owner');
    }
    public function searchBar() {
        $this->view->renderModule('search', 'searchBar');
    }

    public function search() {
        $name = $_GET['q'];
        Modules::run('template', 'templateHeader', array("$name | Search"));
     
        $this->view->module = 'search';
        $this->view->file = 'searchPage';
       
        $this->view->renderModule('search', 'template');
        Modules::run('template', 'templateFooter');
    }

    public function searchPage(){
       
          $this->view->results = $this->model->searchMain();
        $this->view->renderModule('search', 'searchPage');
    }
    public function BypriceHighToLow() {
       
    }

    public function BypriceLowToHigh() {
        
    }

    public function Bybrand() {
        
    }

    public function ByShop() {
        
    }

    public function ByPriceManually() {
        
    }

    public function searchSidebar($cat_name,$subcat_name) {
       $this->view->product = $this->model->searchSidebar($cat_name,$subcat_name);
    //
       $this->view->renderModule('search', 'searchCategory');
    }

}

?>
