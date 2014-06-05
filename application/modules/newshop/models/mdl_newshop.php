<?php
class Mdl_newshop extends Model{

    function __construct() {
        parent::__construct();
    }
    
    public function payment(){
        if(isset($_POST['check'])){
       $email = $_POST['email'];
        $res = $this->db->select("SELECT * from ownerrequest where email='$email'");
        /**
         * Here we assume that now onwards that user has submitted amount to admin account
         */
        if(!empty($res)){
            Modules::run('admin_account','new_entry',array('email'=>$email));
        }
        return $res;
//  print_r($res);
    }
    }
}
?>
