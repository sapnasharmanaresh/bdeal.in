<?php

class Admin_sales  extends Controller{

    function __construct() {
        parent::__construct();
         @Session::init();

        if (Session::get('loggedIn')) {
            
        } else {
            header('Location:' . BASEURL . 'user/login');

            exit;
        }
     
       // echo Hash::create('sha256','bdeal',HASH_PASSWORD_KEY);
       $this->loadModel('admin_sales');
    }
    
    public function header($title){
        Modules::run('header','emp',array($title));
        $this->view->renderModule('admin_sales','navigation');
        $this->footer();
    }
    public function dashboard(){
      $this->header('Admin Sales');
        $this->userGraph();
        $this->visitors();
      $this->view->renderModule('admin_sales','home');
    }
    
    public function footer(){
			Modules::run('footer','profileFooter');
		}
    
    public function logout(){
          Session::destroy();
        header('Location:' . BASEURL);
    }
    
    public function shopsDetail(){
        $this->header('Shops Detail');
        $this->view->module = 'shop';
        $this->view->file = 'detail';
        $this->view->renderModule('admin_sales','template');
    } 
    
	public function currentOrders(){
		 $this->header('Current Orders');
        $this->view->module = 'orders';
        $this->view->file = 'mallCurrentOrders';
        $this->view->renderModule('admin_sales','template');
	}
	
	public function pastOrders(){
		 $this->header('Current Orders');
        $this->view->module = 'orders';
        $this->view->file = 'mallPastOrders';
        $this->view->renderModule('admin_sales','template');
	}
	
	public function salary(){
		 $this->header('Salary');
		   $this->view->module = 'salary';
        $this->view->file = 'getSalaryAmount';
        $this->view->renderModule('admin_sales','template');
	
	}
	
	public function mail(){
		$this->header('Mail');
		$this->view->module = 'mail';
        $this->view->file = 'mailPage';
        $this->view->renderModule('admin_sales','template');
	}
	
	public function createMail(){
			$this->header('Create New Mail');
		$this->view->module = 'mail';
        $this->view->file = 'create_mail';
        $this->view->renderModule('admin_sales','template');
	}
	
	public function sendMail(){
		$this->header('Send Mail');
		
		$this->view->module = 'mail';
        $this->view->file = 'send_mail';
        $this->view->renderModule('admin_sales','template');
	}
	
	public function analysis(){
	}
	
	 public function userGraph() {
      
        $this->view->myData = $this->model->userGraph();
	
    }

    public function visitors() {
        $this->view->visitorsData = $this->model->visitors();
    }
    
    public function interaction(){
		Modules::run('interaction','');
	}
}
?>
