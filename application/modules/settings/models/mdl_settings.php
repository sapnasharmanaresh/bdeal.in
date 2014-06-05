<?php

class Mdl_settings extends Model {

    function __construct() {
        parent::__construct();
    }

    public function getStoreSettings() {
        $shop_id = Session::get('shop_id');
        $shopDetail = $this->db->select("SELECT * FROM shop LEFT JOIN `user-detail` on `user-detail`.`user_id`=shop.owner_id where shop.shop_id = '$shop_id' ");
        return $shopDetail;
    }

  
    public function setStoreSettings() {
        if (isset($_POST['saveGeneralSettings'])) {
            
             $shop_id = Session::get('shop_id');
             $shopName = $_POST['shopName'];
            $homepageTitle = $_POST['homepageTitle'];
            $shopDescription = $_POST['shopDescription'];
            $email = $_POST['email'];
            $invoiceAddress = $_POST['invoiceAddress'];
            $contact = $_POST['contact'];
            $shopLogo = $_FILES['shopLogo']['name'];
            $tmp_logo = $_FILES['shopLogo']['tmp_name'];
            $ext = pathinfo($shopLogo,PATHINFO_EXTENSION);
            try{
            $this->db->update('shop',array(
                'shop_name' => $shopName,
                'homepageTitle' => $homepageTitle,
                'description'=> $shopDescription,
                'invoiceAddress' => $invoiceAddress,
                'logo' =>$shop_id.'.'.$ext
            ),"shop_id='$shop_id'");
            }
            catch(PDOException $e){
                echo "error in updation";
            }
           
            move_uploaded_file($tmp_logo, SHOPLOGO.$shop_id.'.'.$ext);
        }
    }

}

?>
