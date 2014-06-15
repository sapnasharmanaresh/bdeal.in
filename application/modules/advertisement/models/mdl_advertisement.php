<?php

class Mdl_advertisement extends Model {

    function __construct() {
        parent::__construct();
    }

    public function owner_adver() {

        if (isset($_POST['sendToAdmin'])) {    //  echo "hi";  
            // echo Session::get('username');
            // print_r($_FILES);
            $image = $_FILES['adverToAdmin']['tmp_name'];
            //  echo $image;
            $im = $_FILES['adverToAdmin']['name'];
            //echo $im;
            // echo ADVERTISEMENT . $im;
            // move_uploaded_file($image, ADVERTISEMENT . $im);

            $id = $this->db->select("SELECT id from user where username='Admin'");
            $to_id = $id[0]['id'];
            $from_id = Session::get('user_id');
            $this->db->insert('advertisementrequest', array(
                'from_user_id' => Session::get('user_id'),
                'to_user_id' => $id[0]['id'],
                'dateOfRequest' => date('Y-m-d'),
                'image' => $im
            ));
            $dir = ADVERTISEMENT . $to_id . "/" . $from_id;
            if (!is_dir($dir)) {
                mkdir($dir, 0777, true);
            } move_uploaded_file($image, ADVERTISEMENT . $to_id . "/" . $from_id . "/$im");
        } elseif (isset($_POST['sendToOwner'])) {    //  echo "hi";  
            // echo Session::get('username');
            print_r($_FILES);
            $ownerName = $_POST['name'];
            echo $ownerName;
            $image = $_FILES['adverToOwner']['tmp_name'];
            //echo $image;
            $im = $_FILES['adverToOwner']['name'];
            //  echo $im;
            //echo ADVERTISEMENT . $im;
            // move_uploaded_file($image, ADVERTISEMENT . $im);
            $id = $this->db->select("SELECT id from user where username='$ownerName'");
            if (count($id) > 0) {
                $to_id = $id[0]['id'];
                $from_id = Session::get('user_id');
                $this->db->insert('advertisementrequest', array(
                    'from_user_id' => $from_id,
                    'to_user_id' => $id[0]['id'],
                    'dateOfRequest' => date('Y-m-d'),
                    'image' => $im
                ));
                echo ADVERTISEMENT . $to_id . "/" . $from_id;
                $dir = ADVERTISEMENT . $to_id . "/" . $from_id;
                if (!is_dir($dir)) {
                    mkdir($dir, 0777, true);
                } move_uploaded_file($image, ADVERTISEMENT . $to_id . "/" . $from_id . "/$im");
            } else {
                echo "No such owner of this mall exists";
            }
        }
    }

    public function current_rates() {
        $rate = $this->db->select("SELECT advertisement from rates order by adver_last_updated");
        foreach ($rate as $key => $value) {
            return $value['advertisement'];
        }
    }

    public function admin_adver_request() {

        $res = $this->db->select("SELECT advertisementrequest.*,user.username,shop.shop_name from advertisementrequest LEFT JOIN 
               user ON advertisementrequest.from_user_id=user.id
                LEFT JOIN shop ON shop.owner_id=user.id
               where to_user_id='1'");
        return $res;
    }
    
    public function quality_adver_confirmation(){
          $res = $this->db->select("SELECT advertisementrequest.*,user.username,shop.shop_name from advertisementrequest LEFT JOIN 
               user ON advertisementrequest.from_user_id=user.id
                LEFT JOIN shop ON shop.owner_id=user.id
               where to_user_id='1'");
        return $res;
    }
    
    public function quality_adver_con(){
        echo $_POST['id'];
     echo    $_POST['status'];
    }
    
    public function pastRecords($user_id){
       $res =  $this->db->select("SELECT req.id as request_id,req.to_user_id as request_to_user,req.dateOfRequest,req.status,req.quality_dept_report,advertisement.allottedDate as allottedFromDate,advertisement.totalDays+advertisement.allottedDate as allottedToDate FROM advertisementrequest as req LEFT JOIN advertisement on req.`from_user_id`=advertisement.owner_id where req.from_user_id='$user_id'");
       return $res;
    } 
    
    public function welcomePageAdver(){
        $this->db->select('SELECT * FROM advertisement');
    }

}
