<?php
class TopNav extends Controller{

    function __construct() {
        parent::__construct();
        $this->loadModel('topNav');
        
    }
    
    public function listMenus(){
       $this->view->res = $this->model->category();
      // print_r($this->view->res);
    }
    
    public function listSubmenu($menu){
        //echo $menu;
        $sub = $this->model->subCategory($menu);
     //  print_r($sub);
        if($sub[0]['submenu_name']!=null){
         
        foreach($sub as $key=>$value){
        //    print_r($value);
            echo "<p id='".$value['id']."'>".$value['submenu_name']."</p>";
                
            
        }
        }
        else{
            echo "No Listing";
        }
    }
    public function display(){
        $this->listMenus();
       // print_r($res);
         foreach($this->view->res as $key=>$value){
            $this->view->menu = $value['name'];
         
            $this->view->submenu= $this->model->subCategory($value['name']);
        
           // print_r($this->view->submenu);
            $this->view->renderModule('topNav','display_nav');
         }
    }
    public function manageWelcomeNav(){
          if(isset($_POST['saveWelcomeMenus'])){
              echo 'fsfs';
            $this->model->saveMenus();
        }
        $this->view->res = $this->model->listmenus();
        $this->view->renderModule('topNav','home');
    }     
         
  
    
      public function deleteMenu(){
          $this->model->deleteMenu();
      }
    
      public function submenus(){
      
          $this->model->submenus();
      }
}
?>

