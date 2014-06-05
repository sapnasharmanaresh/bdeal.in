<?php
class Mdl_salary extends Model {

    function __construct() {
        
    }
    
    public function getSalaryAmount($department,$employer_id){
        $this->db->select("SELECT $department FROM employee_salary where employer_id='$employer_id'");
    }
    
  
}