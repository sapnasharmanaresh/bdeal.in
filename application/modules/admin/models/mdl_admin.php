<?php

class Mdl_admin extends Model {

    public function __construct() {
        parent::__construct();
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
