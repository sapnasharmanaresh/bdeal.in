<?php

class Settings extends Controller {

    function __construct() {
        parent::__construct();
        $this->loadModel('settings');
    }

    public function admin($type) {
        
        //    $this->model->
        if (isset($_POST['changeLogo'])) {
            Modules::run('header', 'setLogo');
        }
        $this->view->renderModule('settings', "admin_" . $type);
    }

    public function owner($type) {
        $this->view->details = $this->model->getStoreSettings();

        if ($type == 'general') {
            $this->model->setStoreSettings();
            $this->view->renderModule('settings', 'owner_' . $type);
        }
    }

}

?>
