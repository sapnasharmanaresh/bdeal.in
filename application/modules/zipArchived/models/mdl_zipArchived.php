<?php
class Mdl_zipArchived extends Model {

    function __construct() {
        parent::__construct();
    }
    
    public function openZip($file){
        echo $file;
      $zip = new ZipArchive();
     if($zip->open($file) === TRUE){
         
     $zip->extractTo('assets/uploads/productCsv/');
      
       
       $zip->close();
       echo "ok";
     }
     else{
         echo "fail";
     }
       
    /*
$rar_file = rar_open($file) or die("Can't open Rar archive");
        $entries = rar_list($rar_file);

foreach ($entries as $entry) {
    echo 'Filename: ' . $entry->getName() . "\n";

    $entry->extract('/dir/extract/to/');
}

rar_close($rar_file);*/
     

    }
}

?>
