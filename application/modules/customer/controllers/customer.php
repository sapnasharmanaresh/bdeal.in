<?php

class Customer extends Controller {

    public function __construct() {
        parent::__construct();
        Session::init();
        if (isset($_SESSION['loggedIn'])) {
        } else {
            echo "Kindly login to access Your account";
            exit;
        }
    }

    public function header($title){
        Modules::run('header','customer',array($title));
        $this->view->renderModule('customer', 'navigation');
        
    }
    
    public function dashboard(){
        $this->view->title='Customer';
        $this->header('Customer | Home');
    }
    
    public function place_order(){
        
    }
    public function order_list(){
        
    }
    public function cart(){
        $this->header('cart');
        Modules::run('cart','cart',array(Session::get('user_id')));
    }
    
    public function wishList(){
        $this->header('WishList');
        $user_id = Session::get('user_id');
        Modules::run('wishList','wishList',array($user_id));
    }
    
    public function reviews(){
        Modules::run('reviews','getCustomerReview');
    }
    public function recommended(){
        
    }
    
    public function complaints(){
         $this->header('Complaints');
        Modules::run('feedback','complaints');
    }
    public function feedback(){
         $this->header('Feedback');
        Modules::run('feedback','feedback');
    }
    public function personalInformation(){
        
    }    

    public function changePassword(){
        
    }
    public function email(){
        
    }
   

    
    public function logout() {
        Session::destroy();
        header('Location:' . BASEURL);
    }

} 
?>
