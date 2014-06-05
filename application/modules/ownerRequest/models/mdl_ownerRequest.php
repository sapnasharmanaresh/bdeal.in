<?php

class Mdl_ownerRequest extends Model {

    function __construct() {
        parent::__construct();
    }
/**
 * Here owner request form is processed and request has been sent to admin
 * Mail has been sent to the requester
 * @return string send error back if found form incomplete
 */
    public function send() {
        if (isset($_POST['request'])) {
       
            $name = $_POST['name'];
            $email = $_POST['email'];
            $shop = $_POST['shopname'];
            $desc = $_POST['shopdescription'];
            $contact = $_POST['contact'];
            $deal = $_POST['deal'];
            $product_list = $_FILES['product_list']['tmp_name'];
            $product_list_name = $_FILES['product_list']['name'];
            $product_images = $_FILES['product_image']['tmp_name'];
            $product_images_name = $_FILES['product_image']['name'];
            $ext = pathinfo($product_list_name, PATHINFO_EXTENSION);
            $ext2 = pathinfo($product_images_name, PATHINFO_EXTENSION);
           
            if (!empty($name) && !empty($email) && !empty($shop) && !empty($desc) && !empty($contact) && !empty($deal)) {
               $exist = $this->db->select("select * from ownerrequest where email='$email'"); 
               $num=count($exist);
               
               if($num>0){
                    echo "This email exists already in database.Try another one!";
                    
                }
                else{
                   
                $rate = $this->db->select("select `new_shop_rent` from rates order by new_shop_last_updated desc"); 
               foreach($rate as $k=>$v){
                   $rate = $v['new_shop_rent'];
               }
                $this->db->insert('ownerrequest', array(
                    'ownerName' => $name,
                    'email' => $email,
                    'shopName' => $shop,
                    'shopDescription' => $desc,
                    'contact' => $contact,
                    'profitdeal' => $deal,
                    'status' => 'Pending',
                    'replyfromqualitydpt' => 'Pending',
                    'timestamp' => date('Y-m-d'),
                    'shop_charges'=>$rate
                ));

                $id = $this->db->lastInsertId();
                $product_list_name = "ore_" . $id . ".$ext";
                $product_images_name = "ore_" . $id . ".$ext2";

                move_uploaded_file($product_list, PRODUCT_XLS . $product_list_name);
                move_uploaded_file($product_images, PRODUCT_XLS . $product_images_name);
                $this->db->update('ownerrequest', array(
                    'product_file' => $product_list_name
                        ), "id=$id");

                $this->db->insert('notification',array(
                                'email'=>$email,
                                'notification'=>"New Owner Request has been recieved from $email",
                                'timestamp'=>date('Y-m-d')
                )); 
                Modules::run('mail', 'owner_request_confirmation', array($id));
                echo "Your request has been successfully sent";
            }
            }
            else {
                $error = "Kindly check the from again for errors";
                return $error;
            }
            }
        
    }

    public function track() {

        if (isset($_POST['find'])) {
            $email = $_POST['request_email'];
            $out = $this->db->select("SELECT * FROM ownerrequest where email = :email and status!='Approved' and replyfromqualitydpt!='Approved'", array(':email' => $email));
            //print_r($out);
            return $out;
        }
    }

    public function request_detail() {
        $res = $this->db->select("SELECT * FROM ownerrequest", array(), PDO::FETCH_ASSOC);
        //print_r($res);
        return $res;
    }

    public function status() {
        echo $id = $_POST['id'];
        echo $status = $_POST['status'];
        if ($status == "Rejected") {
            $this->db->delete("ownerrequest", "id=$id");
            Modules::run('mail', 'owner_request_rejection');
        } else {
            $this->db->update('ownerrequest', array(
                'status' => $status
                    ), "id=$id"
            );
        }
    }

    public function quality_owner_request() {

        $res = $this->db->select("SELECT * FROM ownerrequest where status='Approved' and replyfromqualitydpt='Pending'", array(), PDO::FETCH_ASSOC);
        // print_r($res);
        return $res;
    }

    public function replyfromqualitydpt() {
        $id = $_POST['id'];
        $replyfromqualitydpt = $_POST['replyfromqualitydpt'];
        echo "<script>alert($replyfromqualitydpt)</script>";
        $user_id = $this->db->select("SELECT id from user where username='admin'");

        if ($replyfromqualitydpt == 'Rejected') {
            $this->db->insert('notification', array(
                'user_id' => $user_id[0]['id'],
                'notification' => 'Request from ore_' . $id . 'has been rejected by quality department',
                'timestamp' => date('Y-m-d')
            ));
            Modules::run('mail', 'owner_request_rejection', array('id' => $id));
            $this->db->delete('ownerrequest', "id=$id");
        } else {
            $this->db->update('ownerrequest', array(
                'replyfromqualitydpt' => $replyfromqualitydpt
                    ), "id=$id"
            );
            // echo "asld";
            if ($replyfromqualitydpt == 'Approved') {
                // echo "Accepted";
                $this->db->insert('notification', array(
                    'user_id' => $user_id[0]['id'],
                    'notification' => 'Request from ore_' . $id . 'has been approved by quality department',
                    'timestamp' => date('Y-m-d')
                ));

                Modules::run('mail', 'owner_request_acceptance', array('id' => $id));
              
        }
    }
    }

    public function check_email_avail() {
        $val = $_POST['username'];
        $res = $this->db->select("SELECT email from ownerrequest where email  like '$val%'");
        //print_r($res);
        //while (list($key, $value) = each($res)) {
        $c = count($res);
        //echo $c;
        if ($c > 0) {
            echo 0;
        } else {
            echo 1;
        }
    }

}

