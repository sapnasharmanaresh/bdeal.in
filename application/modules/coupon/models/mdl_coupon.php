<?php

class Mdl_coupon extends Model {

    function __construct() {
        parent::__construct();
    }

    public function setCoupon() {
        if (isset($_POST['createCoupon'])) {
            $couponName = $_POST['couponCode'];
            $discount = $_POST['discount'];

            $val = $this->db->select("SELECT * FROM coupon where coupon_name = '$couponName'");
            if (count($val) > 0) {
                echo "Coupon $couponName already exits.Try another one";
            } else {
                $this->db->insert('coupon', array(
                    'from_user_id' => Session::get('user_id'),
                    'coupon_name' => $couponName,
                    'discount' => $discount
                ));

                echo "Successfully Created";
            }
        }
    }

    public function getCoupon() {
        $shop_id = Session::get('shop_id');
        $res = $this->db->select("SELECT * FROM coupon where shop_id=$shop_id");
      //  print_r($res);
        return $res;
    }

}

?>
