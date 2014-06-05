<?php

/**
 * check if sign before amount is necessary or not
 * 
 * given only for advertisement
 */
class Mdl_account extends Model {

    function __construct() {
        parent::__construct();
    }

    public function transactions($type, $role = false) {
        if ($type == 'new shop charges') {
            $purpose = $this->db->select("SELECT id from purpose where description = '$type'");
            $purpose_id = $purpose[0]['id'];

            /**
             * It is supposed that when new owner submits money for new shop 
             * then at that time  he will not have all the credentials of shop and user
             * so the amount entered in database will be saved by its email id
             */
            $this->db->insert('admin_account', array(
                'transactionWith' => 'shop',
                'email' => $email,
                'purpose_id' => $purpose_id,
                'amount' => $amount,
                'date' => date('Y-m-d')
            ));
            /**
             * record of owner is maintained only after he got all the credentials 
             * before that ,i.e new shop charge will not be counted
             */
        } elseif ($type == 'employee salary') {
            $purpose = $this->db->select("SELECT id from purpose where description = '$type'");
            $purpose_id = $purpose[0]['id'];
            /**
             * Admin will give salary to the sale,quality,purchase and accounts departments
             * that money will be deducted from the total profit of admin or mall
             */
            if ($role == 'admin') {
                $this->db->insert('admin_account', array(
                    'transactionWith' => 'user',
                    'transactionWith_id' => $user_id,
                    'email' => $email,
                    'purpose_id' => $purpose_id,
                    'amount' => '-'.$amount,
                    'date' => date('Y-m-d')
                ));
            }
            /**
             * Similar to admin ,owner will give salary to its employees
             */ elseif ($role == 'owner') {
                $this->db->insert('owner_account', array(
                    'shop_id' => $shop_id,
                    'transactionWith' => 'user',
                    'transactionWith_id' => $user_id,
                    'purpose_id' => $purpose_id,
                    'amount' => '-'.$amount,
                    'date' => date('Y-m-d')
                ));
            }
        } elseif ($type == 'purchase') {
            $purpose = $this->db->select("SELECT id from purpose where description = '$type'");
            $purpose_id = $purpose[0]['id'];
            /**
             * Owner will purchase new products from vendors and pay for it
             */
            $this->db->insert('owner_account', array(
                'shop_id' => $shop_id,
                'transactionWith' => 'vendor',
                'transactionWith_id' => $vendor_id,
                'purpose_id' => $purpose_id,
                'amount' => '-'.$amount,
                'date' => date('Y-m-d')
            ));
        } elseif ($type == 'sales') {
            $purpose = $this->db->select("SELECT id from purpose where description = '$type'");
            $purpose_id = $purpose[0]['id'];
            /**
             * shop will sale all the products and correspondingly receive money from customers
             * that information will be recorded here
             */
            $this->db->insert('owner_account', array(
                'shop_id' => $shop_id,
                'transactionWith' => 'user',
                'transactionWith_id' => $customer_id,
                'purpose_id' => $purpose_id,
                'amount' => $amount,
                'date' => date('Y-m-d')
            ));
        } elseif ($type == 'monthly rent') {
            $purpose = $this->db->select("SELECT id from purpose where description = '$type'");
            $purpose_id = $purpose[0]['id'];
            /**
             * monthly rent will be given by shop owner to admin
             * here two operations will be performed 
             * 1)admin will receive payment
             * 2)owner will give payment
             */
            $this->db->insert('admin_account', array(
                'transactionWith' => 'shop',
                'transactionWith_id' => $shop_id,
                'purpose_id' => $purpose_id,
                'amount' => $amount,
                'date' => date('Y-m-d')
            ));
            $this->db->insert('owner_account', array(
                'shop_id' => $shop_id,
                'transactionWith' => 'user',
                'transactionWith_id' => '1',
                'purpose_id' => $purpose_id,
                'amount' => '-'.$amount,
                'date' => date('Y-m-d')
            ));
        } elseif ($type == 'advertisement') {
            /**
             * advertisement money will be 
             * 
             * if admin
             * will receive from shop
             * 
             * if owner
             * give to admin
             * can receive from owner for advertisement display
             * 
             * third owner
             * will give money to 2nd one
             */
            $purpose = $this->db->select("SELECT id from purpose where description = '$type'");
            $purpose_id = $purpose[0]['id'];
            if ($role == 'admin') {
                $this->db->insert('admin_account', array(
                    'transactionWith' => 'shop',
                    'transactionWith_id' => $shop_id,
                    'email' => $email,
                    'purpose_id' => $purpose_id,
                    'amount' => $amount,
                    'date' => date('Y-m-d')
                ));
            } elseif ($role == 'owner') {
                /**
                 * check this out
                 * both type of possibilities
                 * 
                 */
                $this->db->insert('owner_account', array(
                    'shop_id' => $shop_id,
                    'transactionWith' => $txn_with,
                    'transactionWith' => $user_id,
                    'purpose_id' => $purpose_id,
                    'amount' => $sign . $amount,
                    'date' => date('Y-m-d')
                ));
            }
        } elseif ($type == 'profit deal') {
            $purpose = $this->db->select("SELECT id from purpose where description = '$type'");
            $purpose_id = $purpose[0]['id'];
                $this->db->insert('admin_account', array(
                    'transactionWith' => 'shop',
                    'transactionWith_id' => $shop_id,
                    'email' => $email,
                    'purpose_id' => $purpose_id,
                    'amount' => $amount,
                    'date' => date('Y-m-d')
                ));
            
          
                $this->db->insert('owner_account', array(
                    'shop_id' => $shop_id,
                    'transactionWith' => 'user',
                    'transactionWith_id' => '1',
                    'purpose_id' => $purpose_id,
                    'amount' => '-'.$amount,
                    'date' => date('Y-m-d')
                ));
            
        } elseif ($type == 'shipment charges') {
            $purpose = $this->db->select("SELECT id from purpose where description = '$type'");
            $purpose_id = $purpose[0]['id'];
         
                $this->db->insert('owner_account', array(
                    'shop_id' => $shop_id,
                    'transactionWith' => 'user',
                    'transactionWith_id' => $customer_id,
                    'purpose_id' => $purpose_id,
                    'amount' => '-'.$amount,
                    'date' => date('Y-m-d')
                ));
            
        }
    }
    
     /**
         * Every bit of information will be extracted here 
         * like full description of shop 
         * or of user from which partcular amount has been recieved
         */
    public function adminAccountDetail(){
       
        $this->db->select("SELECT * FROM admin_account");
    }
    
     /**
         * Every bit of information will be extracted here 
         * like full description of shop 
         * or of user from which partcular amount has been recieved
         */
    public function ownerAccountDetail($shop_id){
        $this->db->select("SELECT * FROM owner_account where shop_id='$shop_id'");
    }
    /**
     * Here only total amount is calculated 
     */
    public function totalInAdminAccount(){
        $this->db->select("SELECT SUM('amount') FROM admin_account");
    }
    /**
     * 
     * @param type integer $shop_id  gives id of shop of which information need to be fetch for particular shop
     * 
     * this gives only the total amount of any shop
     */
    public function totalInOwnerAccount($shop_id){
         $this->db->select("SELECT SUM('amount') FROM owner_account where shop_id='$shop_id'");
    }
    
    public function mallProfit(){
        
    }
    
    public function shopProfit(){
        
    }
    public function mallProfitGraph(){
        /**
         * 
         * calculated monthly basis
         * 
         */
    }
    
    public function shopProfitGraph(){
        
    }
    
    public function mallPerformance(){
        /**
         * depending of visitors and users
         */
    }

}

?>
