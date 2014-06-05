<?php

class Mdl_Cart extends Model {

    public function __construct() {
        //echo "jjop";
        parent::__construct();
    }

    public function addToCart() {

        $product_id = $_POST['product_id'];
        $user_id = Session::get('user_id');
        $res = $this->db->select("SELECT cart_id from cart where user_id='$user_id'");

        if (count($res[0]) > 0) {
            $cart_id = $res[0]['cart_id'];
            $product_exist = $this->db->select("SELECT * FROM `cart-detail` where cart_id = '$cart_id' and product_id='$product_id'");
            print_r($product_exist);
          
           if (count($product_exist) > 0) {
                $this->db->update('cart-detail', array(
                    'quantity' => $product_exist[0]['quantity']+1
                        ), "cart_id = '$cart_id' and product_id = '$product_id'");
            } else {
               
                $this->db->insert('`cart-detail`', array(
                    'cart_id'=>$cart_id,
                    'product_id' => $product_id,
                    'quantity' => '1'
                        ));
            }
        } else {
            $this->db->insert('cart', array(
                'date_created' => date('Y-m-d H:i:s'),
                'user_id' => $user_id,
            ));

            $this->db->insert('cart-detail', array(
                'cart_id' => $cart_id,
                'product_id' => $product_id,
                'quantity' => $quantity
            ));
        }
    }
   

    public function cartCount() {
        $user_id = Session::get('user_id');
        $count = $this->db->select("select sum(quantity) as total from cart,`cart-detail` where cart.cart_id = `cart-detail`.cart_id and cart.user_id = $user_id");
        if(count($count)>0){
        return $count[0]['total'];
        }
        else{
            return '0';
        }
    }

    public function deleteFromCart() {
        $this->db->delete('cart-detail', "product_id='$product_id'");
    }

    public function deleteCart() {
        $this->db->delete('cart', "cart_id='$cart_id'");
        $this->db->delete('cart-detail', "cart_id='$cart_id'");
    }

    public function cart($user_id) {
        $cart = $this->db->select("SELECT * FROM `cart`,product,`product-detail` as pdetail ,`cart-detail`as detail 
                                WHERE cart.cart_id=detail.cart_id and product.product_id = detail.product_id and 
                                pdetail.product_id=detail.product_id and cart.user_id='$user_id'
                                                                        ");
        return $cart;
    }

    public function updateQuantity() {
        $quantity = $_POST['quantity'];
        $p_id = $_POST['product_id'];
        $this->db->update('cart-detail', array(
            'quantity' => $quantity
                ), "product_id=$p_id");
    }

}

?>
