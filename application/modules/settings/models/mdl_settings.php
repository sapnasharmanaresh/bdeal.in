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
            $ext = pathinfo($shopLogo, PATHINFO_EXTENSION);
            try {
                $this->db->update('shop', array(
                    'shop_name' => $shopName,
                    'homepageTitle' => $homepageTitle,
                    'description' => $shopDescription,
                    'invoiceAddress' => $invoiceAddress,
                    'logo' => $shop_id . '.' . $ext
                        ), "shop_id='$shop_id'");
            } catch (PDOException $e) {
                echo "error in updation";
            }

            move_uploaded_file($tmp_logo, SHOPLOGO . $shop_id . '.' . $ext);
        }
    }

    public function footerPages() {
        if (isset($_POST['save'])) {
            $content = $_POST['content'];

            $h = fopen('content.txt', 'w');
            try {
                fwrite($h, $content);
            } catch (Exception $e) {
                echo $e->getMessage();
            }

            fclose($h);
            echo 'saved successfully!!!';
        }

        if (isset($_POST['hid'])) {
            /* echo "<script>
              parent.document.getElementById('img_path').value=".
              $_FILES['file']['name']
              ."
              </script>"; */
            $tmp_name = $_FILES['file']['tmp_name'];
            echo $name = $_FILES['file']['name'];

            move_uploaded_file($tmp_name, 'uploads/' . $name);
            $f = fopen('content.txt', 'r+');
            $content = fread($f, filesize('content.txt'));
            echo $content;
            $val = strstr($content, 'hello');
            echo $fpos = ftell();
            //fwrite($f,'1.png');
            //fseek($f,$fpos,0);
            //	fwrite($f,'1.png');
            fclose($f);
        }
    }

}

?>
