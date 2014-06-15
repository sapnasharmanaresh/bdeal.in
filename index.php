<?php
require_once 'application/config/database.php';
require_once 'application/config/paths.php';
require_once 'application/config/constants.php';
//require_once 'assets/third-party/chart/pChart/'
 require_once ('assets/third-party/chart/pChart/pData.class');
require_once ("assets/third-party/chart/pChart/pChart.class");
require_once ('assets/third-party/mail/PHPMailerAutoload.php');
//require_once 'vendor/autoload.php';
 require_once 'assets/third-party/excel/PHPExcel/IOFactory.php';
require_once('assets/third-party/dompdf/dompdf_config.inc.php');
require_once('assets/third-party/mustache/src/Mustache/Autoloader.php');


   function myloader($class){
    require_once "application/libs/$class.php";
}

spl_autoload_register('myloader');

// include library
//require_once 'application/libs/Controller.php';
//require_once 'application/libs/View.php';
//require_once 'application/libs/Model.php';
//require_once'application/libs/Bootstrap.php';


//require_once 'application/libs/Database.php';
//require_once 'application/libs/Modules.php';
$bootstrap = new Bootstrap();
//echo MODULE;
?>

