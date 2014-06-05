<?php
class Mdl_profile  extends Model{

    function __construct() {
        parent::__construct();
    }
    
    public function update(){
        
    }
    public function view(){
     $user_id = Session::get('user_id');
    //   echo $username;
       $res = $this->db->select("SELECT user.*,detail.* FROM user left join `user-detail` as detail on user.id=detail.user_id where user.id='$user_id'");
      return $res;
    }
    
    
    
    public function detail(){
         $username = Session::get('username');
    //   echo $username;
       $res = $this->db->select("SELECT user.*,detail.* FROM user left join `user-detail` as detail on user.id=detail.user_id where user.username='$username'");
        if(isset($_POST['upload'])){
            $user_id = Session::get('user_id');
            $tmp = $_FILES['file']['tmp_name'];
            $name = $_FILES['file']['name'];
            $ext = pathinfo($name, PATHINFO_EXTENSION);
            move_uploaded_file($tmp,DIRECTORY_IMAGES.$user_id.'.'.$ext);
            $this->db->update('user-detail',array(
                            'image' => $user_id.'.'.$ext
            ),"user_id='$user_id'");
        }
        if(isset($_POST['changePassword'])){
           
            $prev_pass = $_POST['prevPass'];
            $new_pass = $_POST['newPass'];
            $confirm_pass = $_POST['confirmPass'];
            if($new_pass == $confirm_pass){
                $hashedPass = Hash::create('sha256', $prev_pass, HASH_PASSWORD_KEY);
               // echo $res[0]['password'];
               if($hashedPass == $res[0]['password']){
                   $updated = $this->db->update('user',array(
                       'password'=>$new_pass
                   ),"username=$username");
                 if($updated = 1){
                   echo "Password changed successfully";
            }
            else{
               echo " Error occured while changing password";
            }
               }
               
            else{
             echo "incorrect Password";   
            }
            }
            else{
                echo "Passwords don't match!!Try Again";
            }
        }
    }
    

}
?>
