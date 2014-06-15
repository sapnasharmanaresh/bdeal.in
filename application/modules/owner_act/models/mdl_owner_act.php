<?php
class Mdl_owner_act extends Model {

     function __construct() {
        parent::__construct();
       
    }
    
    public function total_amount(){
        $shop_id = Session::get('shop_id');
        $amount = $this->db->select("SELECT sum(amount) as total from owner_account where shop_id=$shop_id");
     // print_r($amount);
       if($amount == true){
       return $amount[0]['total'];
    }
    else{
        return (int)0;
    }
    }
    
    public function detail(){
        $detail = $this->db->select('SELECT act.id,act.amount,act.date,act.email, purpose.description  as purpose,user.username,shop.shop_id,shop.shop_name
                                                                FROM owner_account as act 
                                                                LEFT JOIN
                                                                            purpose 
                                                                                ON  act.purpose_id = purpose.id 
                                                                LEFT JOIN
                                                                            user 
                                                                                ON act.transactionWith_Id = user.id
                                                                LEFT JOIN 
                                                                            shop 
                                                                                ON shop.shop_id = act.shop_Id
                                                    ');
    //  print_r($detail);
        return $detail;
        
    }
    
    public function new_entry($email){
        $purpose = 'new shop charges';
   //  echo $email;
        $amt = $this->db->select("SELECT * from ownerrequest where email='$email'");
        foreach($amt as $key=>$value){
            $amount = $value['shop_charges'];
            $id = $value['id'];
    //        echo $amount;
        }
        $res = $this->db->select("SELECT id from purpose where description='$purpose'");
        foreach($res as $key=>$value){
          $purpose_id = $value['id'];
            
        }
        $this->db->insert('owner_account',array(
                                           'email'=>"$email",
                                            'purpose_id'=>"$purpose_id",
                                            'amount'=>"$amount",
                                            'date'=>date('Y-m-d')
                                        ));
          $this->db->insert('notification',array(
                                         'user_id'=>Session::get('user_id'),
                                        'description'=>'New Shop Charges has been recieved from ore_'.$id , 
                                        'date'=>date('Y-m-d')
                                        ));
          
    }
      public function userGraph() {
        $users = $this->db->select("SELECT count(*) as total ,timestamp from user group by timestamp");
     //   $num = count($users);
        $myData[0] = array('date','count');
        $title = "No of Users";
        $hAxis = 'Year';
        $vAxis ='Number';
        $div = 'userGraph';
        foreach ($users as $key => $value) {
            $date = date('Y', strtotime($value['timestamp']));
            $num = $value['total'];
            $myData[$key+1] =array($date,(int)$num);
          
      //      $myD = implode(',', $myData);
        }
          //  echo "<script type='text/javascript' src='https://www.google.com/jsapi'></script>";
           // echo "<script>$(#$div).trigger('click');graph($myD,$title,$vAxis,$hAxis,$div);</script>";
         
       $value = json_encode($myData);
       
        return $value;
        }
    
    
     public function visitors() {
        $users = $this->db->select("SELECT hits,date FROM visitors");
        $myData[0] = array('date', 'count');
      
        foreach ($users as $key => $value) {
            $date = date('Y', strtotime($value['date']));
            $num = $value['hits'];
            $myData[$key+1] = array($date,(int)$num );
          
           
        }echo "<script type='text/javascript' src='https://www.google.com/jsapi'></script>";
           // echo "<script>$(#$div).trigger('click');graph($myD,$title,$vAxis,$hAxis,$div);</script>";
         //    print_r($myD);
        
       $val =  json_encode($myData);
            return $val;
        }
    
    
}
?>
