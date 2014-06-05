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
       
        $this->view->renderModule('topNav','admin-manage');
    }     
         
    public function listAll(){
        $this->listMenus();
        $this->view->renderModule('topNav','display_all');
    }
    
    public function addMenu(){
        $this->view->count = $this->model->addMenu();
        $this->view->renderModule('topNav','add_menu');
    }
    
    public function addSubmenu(){
        $this->view->renderModule('topNav','add_submenu');
    }
    
    public function navList(){
        $this->listMenus();
        $this->view->renderModule('topNav','nav_list');
    }
    
    public function positionNav(){
        $this->model->positionNav();
    }

    public function editSubmenu(){
        $this->model->editSubmenu();
        //echo "hey";
    }
}
?>

