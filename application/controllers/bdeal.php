<?php

/*
 * Main controller of whole site
 */

class Bdeal extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->renderMain('index');
      }

}