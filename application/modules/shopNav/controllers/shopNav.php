<?php
class ShopNav extends Controller {

    function __construct() {
        parent::__construct();
        $this->loadModel('shopnav');
    }
    
    public function displayNav($shop_id){
          $this->view->res = $this->model->listMenus($shop_id);
            foreach($this->view->res as $key=>$value){
            $this->view->menu = $value['menu_name'];
         
      //      $this->view->submenu= $this->model->submenus($shop_id,$value['menu_name']);
        
           // print_r($this->view->submenu);
            $this->view->renderModule('shopNav','display_nav');
         }

    }
    
    public function home($shop_id){
        if(isset($_POST['saveShopMenus'])){
            $this->model->saveMenus();
        }
        $this->view->res = $this->model->listmenus($shop_id);
        $this->view->renderModule('shopNav','home');
    }
    
   
    public function addSubmenu(){
        $this->model->addSubmenu();
    }
    
      public function deleteMenu(){
          $this->model->deleteMenu();
      }
    
      public function submenus(){
      
          $this->model->submenus();
      }

}