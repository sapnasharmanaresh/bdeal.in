<?php

 class Chat extends Controller{
	
	public function __construct(){
		
		parent::__construct();
		$this->loadModel('chat');
	}
	public function chatstart(){
	echo 'dfds';
		$this->view->renderModule('chat','chatFile');
	}
        
        public function getchat(){
         $this->model->chat();
        }
 } 
