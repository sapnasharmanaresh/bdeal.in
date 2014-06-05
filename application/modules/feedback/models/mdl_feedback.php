<?php

class Mdl_feedback extends Model {

    function __construct() {
        parent::__construct();
    }
    
    function complaints_admin(){
       $to_admin = $this->db->select('SELECT * FROM complaint');
       return $to_admin;
       
    }
    
    function insert_compaint(){
        $this->db->insert('complaint',array(
                    'complaint_type' =>$_POST['type'],
                    'from_user_id'=>Session::get('user_id'),
                    'to_user_id'=>$_POST['shop'],
                    'complaint' =>$_POST['complaint']
        ));
    }
    
    function complaints_owner(){
        $user_id = Session::get('user_id');
        $to_owner = $this->db->select("SELECT * FROM complaint where complaint.to_user_id=$user_id");
        return $to_owner;
    }

     function feedback_admin(){
       $to_admin = $this->db->select('SELECT * FROM feedback');
       return $to_admin;
       
    }
    
    function insert_feedback(){
        $this->db->insert('feedback',array(
                    'complaint_type' =>$_POST['type'],
                    'from_user_id'=>Session::get('user_id'),
                    'to_user_id'=>$_POST['shop'],
                    'complaint' =>$_POST['complaint']
        ));
    }
    
    function feedback_owner(){
        $user_id = Session::get('user_id');
        $to_owner = $this->db->select("SELECT * FROM feedback where complaint.to_user_id=$user_id");
        return $to_owner;
    }

}
