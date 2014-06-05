<?php

class Modules {

    public function __construct() {
        
    }

    public static function run($module, $function = false, $data = array()) {
        $file = MODULE . "$module/controllers/$module.php";
        if (file_exists($file)) {
            require_once $file;
        } else {
            Modules::error();
        }
        $controller = new $module();
        if ($function != false) {
            if (!empty($data)) {
                $num = count($data);
                //  $data[0],.....,$data[$num]

                if (method_exists($controller, $function)) {
                    if ($num == '3')
                        $controller->$function($data[0], $data[1], $data[2]);
                    elseif ($num == '2')
                        $controller->$function($data[0], $data[1]);

                    elseif ($num == '1')
                        $controller->$function($data[0]);
                } else {
                    Modules::error();
                }
            } else {
                if (method_exists($controller, $function)) {
                    $controller->$function();
                }
            }
        }
    }

    public static function error() {
        echo "page doesn't exists";
        return false;
    }

}

