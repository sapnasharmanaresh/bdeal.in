<?php
class Mdl_salary extends Model {

    function __construct() {
        parent::__construct();
    }
    
    public function getSalaryAmount($role){
        $this->db->select("SELECT  FROM employee_salary where employer_id='$employer_id'");
    }
    
    public function setSalary(){
       
        $user_id = Session::get('user_id');
        $head = $this->db->select("SELECT head_id from user where user.id='$user_id'");
       if(isset($_POST['save'])){ 
        $this->db->insert('employee_salary',array(
                'employer_id' =>$head[0]['head_id'],
                'accounts'=>$_POST['accounts'],
                'accounts_modified'=>$_POST['accounts_date'],
                'purchase'=>$_POST['purchase'],
                'purchase_modified'=>$_POST['purchase_date'],
                'sales'=>$_POST['sales'],
                'sales_modified'=>$_POST['sales_date'],
                'quality'=>$_POST['quality'],
                'quality_modified'=>$_POST['quality_date'],
                
            
        ));
    }
    else{
       $sal =  $this->db->select("SELECT * FROM employee_salary where employer_id='".$head[0]['head_id']."'");
       
       return $sal;
       
    }
    }
  
}