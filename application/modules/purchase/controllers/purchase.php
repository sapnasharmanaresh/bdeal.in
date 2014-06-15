<?php

class Purchase  extends Controller{

    function __construct() {
        parent::__construct();
    }
    public function department($role){
        if($role == 'admin' )
        $this->view->renderModule('purchase','adminPurchaseDept');
        else
            $this->view->renderModule('purchase','ownerPurchaseDept');
    }
   
  function add_emp($role){
      if($role == 'admin'){
       Modules::run('user','add_admin_purchase');
       }
       else{
            Modules::run('user','add_owner_purchase');
       }
       }
    
    public function newStock(){
        Modules::run('stock','newStock');
    }

   
}
?>
