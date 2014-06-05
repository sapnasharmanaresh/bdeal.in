<?php

class Mdl_mail extends Model {

    function __construct() {
        parent::__construct();
    }

    public function owner_request($id) {
        $res = $this->db->select("SELECT * from ownerrequest where id='$id'  limit 1");
        // print_r($res);
        return $res;
    }

    public function new_shop_rent() {
        $rates = $this->db->select("SELECT new_shop_rent from rates order by new_shop_last_updated desc limit 1");
        //print_r($rates);
        return $rates[0]['new_shop_rent'];
    }

    public function allocate_price($id) {
        $rate = $this->new_shop_rent();
        $this->db->update('ownerrequest', array(
            'shop_charges' => $rate
                ), "id='$id'");
    }

    public function user_detail($id) {
        // echo "reached";
        //echo $id;
        $result = $this->db->select("SELECT user.*,`user-detail`.* FROM user LEFT JOIN `user-detail` ON user.id=`user-detail`.user_id where user.id='$id'");
        return $result;
    }

    public function saveTemplate() {
       echo $ref_name = $_POST['ref_name'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        $this->db->insert('mail',array(
            'reference_name' => $ref_name
        ));
        
        $id = $this->db->lastInsertId();
        $file = fopen(MUSTACHE_FOLDER."/$id._head.mustache",'w') or die("error");
         fwrite($file, $subject);
         fclose($file);
        
         $file = fopen( MUSTACHE_FOLDER."/$id._body.mustache",'w') or die("error");
         fwrite($file, $message);
         fclose($file);
         
          $this->db->update('mail',array(
            'subject' => $id.'_head.mustache',
            'message'=>$id.'_body.mustache'
        ),"id=$id");
    }
    
    public function send_mail(){
       //if all
       $res =  $this->db->select("SELECT email from `user-detail`" );
       return $res;
       
    }

}
