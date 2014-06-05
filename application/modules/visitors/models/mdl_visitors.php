<?php

class Mdl_visitors extends Model {

     private $date;
    function __construct() {
        parent::__construct();
       $this->date= date('Y-m-d');
        
    }
    public function checkPrev(){
        
        $res = $this->db->select("SELECT hits FROM visitors where date='$this->date'");
        //print_r($res);
        return $res;
        
    }
    
    public function prev(){
        $res = $this->checkPrev();
        if($res == true){
             echo (int)$res[0]['hits'];
        }
        else{
            echo (int)0;
        }
    }
    
    public function update(){
       $data = (int)$_POST['data'];
       // echo gettype($data);
        $res = $this->checkPrev();
        if($res == true){
        $this->db->update('visitors',array(
                        'hits'=>$data
        ),"date='$this->date'");
        }
        else{
        $this->db->insert("visitors",array(
                            'date' => $this->date,
                            'hits' => $data      
        ));
        }
    }

}