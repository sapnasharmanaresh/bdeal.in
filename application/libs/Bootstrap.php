<?php

class Bootstrap {

    /**
     *
     * @var string url
     */
    private $_url = null;
    private $_controller = null;

    /**
     * construct the bootstap
     * @return boolean string
     */
    function __construct() {
        //Sets the protected $_url
        $this->_getUrl();
        if (empty($this->_url[0])) {
            $this->_loadDefaultController();
            return false;
        }
        $this->_loadExistingController();
        $this->_callControllerMethod();
    }

    /*
     * this function $_GET the url from the address bar
     */

    private function _getUrl() {
        $url = isset($_GET['url']) ? $_GET['url'] : NULL;
        $url = rtrim($url, '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $this->_url = explode("/", $url);
    }

    /*
     * The controller is loaded when url is null
     */

    private function _loadDefaultController() {
        require_once 'application/controllers/bdeal.php';
        $controller = new bdeal();
    }

    /*
     * If there is something written in url then the respective existing controller is loaded,this checks only first $_url[0] component
     */

    private function _loadExistingController() {
        $file = MODULE . $this->_url[0] . "/controllers/" . $this->_url[0] . ".php";
        if (file_exists($file)) {
            require_once $file;
            $this->_controller = new $this->_url[0]();
            //chk if this can possible it will decrease the number of steps;
            //load model here
        } else {
            $this->_error();
            return false;
        }
    }

    /*
     * whole url is checked and the control is directed to that path
     */

    private function _callControllerMethod() {
       if (isset($this->_url[5])) {
            if (method_exists($this->_controller, $this->_url[1])) {

                $this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3],$this->_url[4],$this->_url[5]);
            } else {
                $this->_error();
            }
            }
        elseif (isset($this->_url[4])) {
            if (method_exists($this->_controller, $this->_url[1])) {

                $this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3], $this->_url[4]);
            } else {
                $this->_error();
            }
           
        }
         elseif (isset($this->_url[3])) {
            if (method_exists($this->_controller, $this->_url[1])) {

                $this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3]);
            } else {
                $this->_error();
            }
        }
       elseif (isset($this->_url[2])) {
            if (method_exists($this->_controller, $this->_url[1])) {

                $this->_controller->{$this->_url[1]}($this->_url[2]);
            } else {
                $this->_error();
            }
        } else {
            if (isset($this->_url[1])) {
                if (method_exists($this->_controller, $this->_url[1])) {
                    $this->_controller->{$this->_url[1]}();
                } else {
                    $this->_error();
                }
            }
        }
    }

    /*
     * error method is used to display errors if page does not exists
     */

    function _error() {
        //require 'libs/Error.php';
        echo "Page doesn't exists";
        return false;
    }

}

?>
