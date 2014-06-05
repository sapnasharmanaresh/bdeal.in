<?php

class Mdl_header extends Model{

    function __construct() {
        parent::__construct();
    }
    
    public function setLogo(){
      $name = $_FILES['logo']['name'];
      $tmp_name= $_FILES['logo']['tmp_name'];  
      move_uploaded_file($tmp_name, SETTINGS.'logo/logo.jpg');
     /*   $this->db->update('settings',array(
                'value' => 'logo.jpg'
        ),"'property'='Logo'");
    */}
    
    public function getLogo(){
        $out = $this->db->select("SELECT * FROM settings where property='Logo'");
       // print_r($out);
        foreach($out as $k=>$v){
            return $v['value'];
        }

        
    }
    
  

}
?>
