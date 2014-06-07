<?php

class Shop extends Controller{

    function __construct() {
        parent::__construct();
        $this->loadModel('shop');
       
    }
    
    public function header($title,$shop_id){
        Modules::run('header','shop',array($title));
         $this->shopLogoBar($shop_id);
        $this->view->shop_id = $shop_id;
        $this->view->renderModule('shop','navigation');
    }
    public function visit($shop_name,$product_id=null){
       $shop_id = $this->model->shopId($shop_name);
         $this->view->shop = $this->model->shop($shop_id);
      
      if($product_id==null){
            $this->header($this->view->shop[0]['homepageTitle'],$shop_id);
        $this->view->products = $this->model->productsInShop($shop_id);
       $this->view->renderModule('shop','home');  
      }
      else{
          
          $this->header($product_id,$shop_id);
            Modules::run('product','product_detail',array($product_id));
           
      }
        
               $this->footer();
    }
  
    public function detail(){
        $this->getList();
        $this->view->renderModule('shop','complete_detail');
    }
    
    public function getList(){
        $this->view->shops  = $this->model->shop_list();
       $this->view->renderModule('shop','shop_list');
    }
    
    public function ownerShopName(){
        $owner_id = Session::get('user_id');
        $this->model->shopName($owner_id);
    }
    
    public function shopLogoBar($shop_id){
        $this->view->details =$this->model->shop($shop_id);
        $this->view->renderModule('shop','shopLogoBar');
    }
    
    public function footer(){
        Modules::run('footer','shopFooter');
    }
    
    public function shop_thumb(){
        $this->view->shops =$this->model->shop_list();
        $this->view->renderModule('shop','shop_thumb');
    }

}
