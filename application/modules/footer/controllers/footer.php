<?php
class Footer extends Controller {

    function __construct() {
        parent::__construct();
    }
    
    public function footer(){
        $this->view->renderModule('footer','vFooter');
    }
    
    public function shopFooter(){
        $this->view->renderModule('footer','shopFooter');
    }
    
    public function profileFooter(){
		$this->view->renderModule('footer','profileFooter');
	}

}
?>
