<?php

class Mail extends Controller {

    function __construct() {
        parent::__construct();
        $this->loadModel('mail');
    }

    public function mail($to, $subject, $message, $success = false, $failure = false,$multiple=false) {

        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->Mailer = 'smtp';
        $mail->SMTPAuth = true;
        $mail->Host = 'smtp.gmail.com'; // "ssl://smtp.gmail.com" didn't worked
        $mail->Port = 465;
        $mail->SMTPSecure = 'ssl';
// or try these settings (worked on XAMPP and WAMP):
// $mail->Port = 587;
// $mail->SMTPSecure = 'tls';


        $mail->Username = "sapnasharmanaresh@gmail.com";
        $mail->Password = "9872639621";

        $mail->IsHTML(true); // if you are going to send HTML formatted emails
        $mail->SingleTo = true; // if you want to send a same email to multiple users. multiple emails will be sent one-by-one.

        $mail->From = "info@bdeal.in";
        $mail->FromName = "Bdeal";

        $mail->addAddress("$to");
        //   $mail->addAddress("aanchalsharma9093@gmail.com", "User 2");
//$mail->addCC("user.3@ymail.com","User 3");
//$mail->addBCC("user.4@in.com","User 4");

        $mail->Subject = "$subject";
        $mail->Body = "$message";

        if (!$mail->Send())
            echo $failure;
        else
            echo $success;
    }

    public function owner_mail() {
        $this->view->renderModule('mail', 'owner_mail');
    }

    public function owner_request_confirmation($id) {
        $res = $this->model->owner_request($id);
        $subject = "Confirmation Mail for your request to be an owner";

        foreach ($res as $key => $value) {
            $to = $value['email'];
          
            $message = "Hi " . strtoupper($value['ownerName']) . ",<br/>
                                <h1>Welcome to bdeal</h1><br/>
                                Your request for <b>" . strtoupper($value['shopName']) . "</b> shop has been successfully sent to mall controller for further processing.<br/>
                                You can track your request at <br/><a href='" . BASEURL . "ownerRequest/track'>" . Hash::create('sha256', BASEURL . "ownerRequest/track", HASH_GENERAL_KEY) . "</a>
                                  <br/>Thank You <br/><br/> For any query you can contact at <pre>query@bdeal.in</pre>";
           
        $success = "You can track your request from your mail";
        $this->mail($to, $subject, $message, $success);
    }
    }

    public function owner_request_rejection($id) {
        $res = $this->model->owner_request($id);
        $subject = "Regarding ownership request";
        foreach ($res as $key => $value) {
            $to = $value['email'];
            $message = "Hi <b> " . strtoupper($value['ownerName']) . ",</b><br/>
                                <h1>Welcome to bdeal</h1><br/>
                                Your request for <b>" . strtoupper($value['shopName']) . "</b> shop has been rejected<br/>
                                You can again come to us with better products and offer.<br><br>Thank you.<br/>
                                    For any query you can contact at <pre>query@bdeal.in</pre>";
        }
        $this->mail($to, $subject, $message);
    }

    public function owner_request_acceptance($id) {
        //  echo "accepted";

        $res = $this->model->owner_request($id);
        // print_r($res);
        $rate = $this->model->new_shop_rent();
        $this->model->allocate_price($id);
        $subject = "Regarding ownership request";

        foreach ($res as $key => $value) {
            $to = $value['email'];
            $message = "Hi <b> " . strtoupper($value['ownerName']) . ",</b><br/>
                                <h1>Welcome to bdeal</h1><br/>
                                <h3><b>Congratulations!</b></h3>
                                Your request for <b>" . strtoupper($value['shopName']) . "</b> shop has been accepted<br/>
                                Kindly deposit amount $rate to mall admin.<br>After that you willl be alloted your unique storefront to control your shop. <br>Thank you.<br/>
                                Kindly deposit<a href=" . BASEURL . "newshop/payment" . "> here</a>   
                                For any query you can contact at <pre>query@bdeal.in</pre>";

            echo $message;
        }
        $this->mail($to, $subject, $message);
    }

    public function assign_login_credentials($id) {

        $res = $this->model->user_detail($id);
     //    print_r($res);
      
        $subject = "Regarding ownership request";

        foreach ($res as $key => $value) {
            $to = $value['email'];
            $username = $value['username'];
            $message = "Hi <b> " . strtoupper($username) . ",</b><br/>
                                <h1>Welcome to bdeal</h1><br/>
                                <h3><b>Congratulations!</b></h3>
                                Your request for shop in bdeal has been accepted<br/>
                               You can login to your account at<br/><b>Username:</b>$username <br/><b>Password</b>:12345<br/>
                                   Be sure to change your password after logging in to Your account.
                                For any query you can contact at <pre>query@bdeal.in</pre>";

            //echo $message;
        }
        $this->mail($to, $subject, $message);
    }
   
    
   
    
    public function new_user($id){
       
        $res = $this->model->user_detail($id);
     //    print_r($res);
      
        $subject = "Get ready for Bdeal";

        foreach ($res as $key => $value) {
            $to = $value['email'];
            $username = $value['username'];
            $message = "Hi <b> " . strtoupper($value['username']) . ",</b><br/>
                                <h1>Welcome to bdeal</h1><br/>
                                <h3><b>Congratulations!</b></h3>
                                You have been successfully registered to use bdeal.Here you can search for all types of products with various discounts. 
                               You can login to your account and start using our services.We provide a unique and amazing storefront to our customers.
                                   Kindly update your profile for good user experience.<br/><br/>
                                For any query you can contact at <pre>query@bdeal.in</pre>";

        
        }
        $this->mail($to, $subject, $message);
    }
    
    public function productDescription(){
      $to = $_POST['email'];
      $url = $_POST['url'];
     $user_id =  Session::get('user_id');
     $value =  $this->model->user_detail($user_id);
        $subject = "Product Suggestion";
            $message = "Hi <b> " .$to. ",</b><br/>
                                <h1>Welcome to bdeal</h1><br/>
                                Your friend <b>".strtoupper($value[0]['username'])."</b> has suggested product to you from <a href='http://bdeal.in/'>http://bdeal.in/</a> ".
                    "<br/>Visit product at<br/><a href=".$url.">".$url."</a>".
                              "<br/>  For any query you can contact at <pre>query@bdeal.in</pre>";

    
        $this->mail($to, $subject, $message);
    }
    
    public function send_to_all(){
        $res = $this->model->send_mail();
		$subject = $_POST['subject'];
		$message = $_POST['message'];
       foreach($res as $v=>$email){
			$to  = $email['email'];
		
			$this->mail($to,$subject,$message);
	   }
       
     
       echo 'Email has been sent!!';
     
       }
       
       public function mailPage(){
		$this->view->renderModule('mail','mailPage');
	   }
	   
	   public function create_mail(){
		    if(isset($_POST['save_mail'])){
             echo  " dafd";
            $this->model->saveTemplate();
        }
			$this->view->renderModule('mail','set_mail');
	   }
	   
	   public function send_mail(){
		   if(isset($_POST['send_mail'])){
			$this->send_to_all();
		}
		$this->view->renderModule('mail','send_mail');
	   }
    
		
}

?>
