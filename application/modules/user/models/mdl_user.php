<?php

class Mdl_user extends Model {

    public $msg;

    public function __construct() {
        ob_start();
        parent::__construct();
    }

    /**
     * This function gets any user in
     * @username string
     * @pass string
     * 
     */
    public function run() {

        $btn = $_POST['submit'];
        $username = $_POST['username'];
        $pass = $_POST['password'];
        if (isset($btn) && !empty($username) && !empty($pass)) {

            $sth = $this->db->select('SELECT *,count(id) FROM user where username=:username and password=:password', array(
                ':username' => $username,
                ':password' => Hash::create('sha256', $pass, HASH_PASSWORD_KEY)
            ));
            $id = $sth[0]['role_id'];
            $role = $this->db->select('SELECT role from role where id=:id', array(
                ':id' => $id
            ));
           
            if (!empty($role)) {
                $role = $role[0]['role'];
                $count = $sth[0]['count(id)'];
                if ($count > 0) {
                    $user_id = $sth[0]['id'];
                    //   echo $username;
                     Session::init();
                    Session::set('loggedIn', 'true');
                    Session::set('username', "$username");
                    Session::set('role', "$role");
                    Session::set('user_id', "$user_id");


                    if ($role == 'admin') {
                        header('Location:' . BASEURL . 'template/admin');
                    } else if ($role == 'customer') {
                        header('Location:' . BASEURL . 'template/customer');
                    } else if ($role == 'admin_sale') {
                        header('Location:' . BASEURL . 'template/admin_sale');
                    } else if ($role == 'admin_purchase') {
                        header('Location:' . BASEURL . 'template/admin_purchase');
                    } else if ($role == 'admin_act') {
                        header('Location:' . BASEURL . 'template/admin_act');
                    } else if ($role == 'owner') {
                        header('Location:' . BASEURL . 'template/owner');
                    } elseif ($role == 'owner_sale') {
                        header('Location:' . BASEURL . 'template/owner_sale');
                    } elseif ($role == 'owner_purchase') {
                        header('Location:' . BASEURL . 'template/owner_purchase');
                    } elseif ($role == 'owner_act') {
                        header('Location:' . BASEURL . 'template/owner_act');
                    } elseif ($role == 'admin_quality') {
                        header('Location:' . BASEURL . 'template/admin_quality');
                    }
                }
            } else {
                $msg = "invalid username or password";
            }
        } else {
            $msg = "Enter all information";
        }
        return $msg;
    }

    /**
     * Here new customer can register
     */
    public function signup() {
        //echo "hey";

        $btn = $_POST['signup'];
        $username = $_POST['username'];
        $pass = $_POST['password'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        if (isset($btn) && !empty($username) && !empty($pass) && !empty($email) && !empty($contact)) {
            $role = 'customer';
            $role_id = $this->db->select('SELECT id from role where role=:role', array(
                ':role' => $role
            ));

            $sel = $this->db->select("SELECT * FROM user,`user-detail` where `user-detail`.email='$email' and user.username='$email'");
            if (count($sel) > 0) {
                echo "Email already registered";
            } else {
                $this->db->insert('user', array(
                    'username' => $username,
                    'password' => Hash::create('sha256', $pass, HASH_PASSWORD_KEY),
                    'role_id' => $role_id[0]['id'],
                    'timestamp' => date('Y-m-d')
                ));
                $id = $this->db->lastInsertId();
                $this->db->insert('`user-detail`', array(
                    'user_id' => $id,
                    'email' => $email,
                    'contact' => $contact,
                    'image' => 'default.png'
                ));

                // echo $id;
                Modules::run('mail', 'new_user', array($id));
                echo "Account has been created Successfully.Now you can login to your account<a href=" . BASEURL . "user/login>Login</a> ";
            }
        } else {
            echo "Enter all information";
        }
    }

    /**
     * This block handles all the new owners
     */
    public function owner_new() {

        $request_id = $_POST['id'];
        $role = $_POST['role'];
        $role_id = $this->db->select("SELECT id from role where role='$role'");
        $result = $this->db->select("SELECT * from ownerrequest where id='$request_id'");
// print_r($role_id);
// print_r($result);
        $ownerName = $result[0]['ownerName'];
        $email = $result[0]['email'];
        $shopName = $result[0]['shopName'];
        $shopDescription = $result[0]['shopDescription'];
        $contact = $result[0]['contact'];
        $deal = $result[0]['profitdeal'];
        $prod_list = $result[0]['product_file'];



        /**
         * This is pre supposed that after sending request to the new owner about the payment 
         * amount has been deposited in admin account ... if implied actually then remove this 
         * query
         */
        $shop_charges = $result[0]['shop_charges'];
         $purpose = 'new shop charges';
        $purpose_id = $this->db->select("SELECT id from purpose where description='$purpose'");
        
        $this->db->insert('admin_account', array(
           
        'email' =>$email,
        'purpose_id' =>$purpose_id[0]['id'],
        'amount' =>$shop_charges,
        'date' =>date('Y-m-d H-i-s')
        ));

        $this->db->insert('user', array(
            'username' => $result[0]['ownerName'],
            'password' => Hash::create('sha256', '12345', HASH_PASSWORD_KEY),
            'role_id' => $role_id[0]['id'],
            'timestamp' => date('Y-m-d')
        ));

        $owner_id = $this->db->lastInsertId();
        //echo $owner_id;
        if ($owner_id != 0) {
            $this->db->insert('`user-detail`', array(
                'user_id' => $owner_id,
                'email' => $email,
                'contact' => $contact,
                'image' => 'default.png'
            ));
            Modules::run('mail', 'assign_login_credentials', array($owner_id));
            Modules::run('uploadList', 'prod_list', array($prod_list, $owner_id));
            $this->db->insert('owner', array(
                'owner_id' => $owner_id,
                'deal' => $deal
            ));
            $this->db->insert('shop', array(
                'shop_name' => $shopName,
                'owner_id' => $owner_id,
                'description' => $shopDescription,
                    'logo' => 'default-logo.png'
            ));
            $this->db->delete('ownerrequest', "id=$request_id");
        }
    }

    public function add_emp() {
        $role = $_POST['role'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $head_id = Session::get('user_id');
        $contact = $_POST['contact'];
        $role_id = $this->db->select("SELECT id FROM role where role='$role'");
//print_r($role_id);
        $existing_mail = $this->db->select("SELECT user.username,detail.email from user,`user-detail` as detail");
//      print_r($existing_mail);
        foreach ($existing_mail as $key => $value) {
            if ($email == $value['email']) {
                //    echo "exists";
                return "exists";
                exit;
            }
        }


        $res = $this->db->insert('user', array(
            'username' => $email,
            'password' => Hash::create('sha256', '12345', HASH_PASSWORD_KEY),
            'head_id' => $head_id,
            'role_id' => $role_id[0]['id'],
            'timestamp' => date('Y-m-d')
        ));
        $user_id = $this->db->lastInsertId();
        $detail = $this->db->insert('`user-detail`', array(
            'user_id' => $user_id,
            'firstname' => $name,
            'email' => $email,
            'image' => 'default.png',
            'timestampImage' => date('Y-m-d'),
            'contact' => $contact
        ));

        //   Modules::run('mail','new_user',array($user_id));
    }

    public function employee() {
        $res = $this->db->select("SELECT user.*,detail.*,u.username as head,role.role from user 
                                                                LEFT JOIN  `user-detail` as detail ON 
                                                                                  user.id=detail.user_id 
                                                                LEFT JOIN user as u on u.id=user.head_id
                                                                LEFT JOIN role on role.id=user.role_id
                                                                                where user.role_id!='1' and user.role_id!='2' and user.role_id!='3'
                       
                                                                            
                                                                            
                ");

// select user.username as head from user where id =(select head_id from user where id ='6') 
        return $res;

        /*    if(isset($_POST['value'])){
          echo $value = $_POST['value'];
          }
          else{
          $value='';
          }
          $res = $this->db->select("SELECT user.*,detail.*,u.username as head,role.role from user
          LEFT JOIN  `user-detail` as detail ON
          user.id=detail.user_id
          LEFT JOIN user as u on u.id=user.head_id
          LEFT JOIN role on role.id=user.role_id
          where user.role_id!='1' and user.role_id!='2' and user.role_id!='3'
          and (user.username like '%$value%' || detail.firstname like '%$value%' || detail.lastname like '%$value%' ||
          detail.email like '%$value%' || detail.address like '%$value%' || detail.country like '%$value%' ||detail.gender like '%$value%' ||
          detail.contact like '%$value%' || detail.city like '%$value%' || detail.state like '%$value%' || role.role like '%$value%' )
          ");

          // select user.username as head from user where id =(select head_id from user where id ='6')
          return $res;
         */
    }

    public function detail($detail_id) {
        
        $res = $this->db->select("SELECT user.*,detail.*,u.username as head,role.role from user 
                                                                LEFT JOIN  `user-detail` as detail ON 
                                                                                  user.id=detail.user_id 
                                                                LEFT JOIN user as u on u.id=user.head_id
                                                                LEFT JOIN role on role.id=user.role_id
                                                                                where user.id=$detail_id
                       
                                                                            
                                                                            
                ");
//print_r($res);
// select user.username as head from user where id =(select head_id from user where id ='6') 
        return $res;
    }

    public function customer() {
        $res = $this->db->select("SELECT user.*,detail.*,u.username as head,role.role,orders.* from user 
                                                                LEFT JOIN  `user-detail` as detail ON 
                                                                                  user.id=detail.user_id 
                                                                LEFT JOIN user as u on u.id=user.head_id
                                                                LEFT JOIN role on role.id=user.role_id
                                                                LEFT JOIN orders on orders.user_id = user.id 
                                                                                where role.role='customer' 
                       
                                                                            
                ");
        /**
         * need to take record of all the orders placed by that customer so far
         */
//    select user.username as head from user where id =(select head_id from user where id ='6') 
        return $res;
    }

    public function owner() {
        $res = $this->db->select("SELECT user.*,detail.*,u.username as head,role.role,shop.* from user 
                                                                LEFT JOIN  `user-detail` as detail ON 
                                                                                  user.id=detail.user_id 
                                                                LEFT JOIN user as u on u.id=user.head_id
                                                                LEFT JOIN role on role.id=user.role_id
                                                                LEFT JOIN shop on shop.owner_id = user.id
                                                                                where user.role_id='3'
                                                                            
                                                                            
                ");

//   select user.username as head from user where id =(select head_id from user where id ='6') 
        return $res;
    }

    public function owner_emp() {
        $user_id = Session::get('user_id');
        $emp = $this->db->select("SELECT user.*,user-detail.* from user
                                                            left join user-detail on
                                                                user.id = user-detail.user-id
                                                                    where user.id = $user_id");
        return $emp;
    }

    public function owner_customer() {
        $user_id = Session::get('user_id');
        $this->db->select("SELECT user.*,user-detail.*,orders.*,order-detail.* from user
                                                            left join user-detail on
                                                                user.id = user-detail.user-id
                                                             left join orders on
                                                                  orders.user_id = user.id
                                                              left join order-detail on
                                                                     orders.order_id=order-detail.order_id   
                                                                    where user.id = $user_id");
    }

    public function account_status() {
        echo $id = $_POST['id'];
        echo $status = $_POST['status'];
        if ($status == "Delete") {
            $this->db->delete('user', "id=$id");
        } else {
            $this->db->update('user', array(
                'status' => $status
                    ), "id='$id'
         ");
        }
    }

}

?>
