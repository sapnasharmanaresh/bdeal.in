<?php
class Mdl_category extends Model {

    function __construct() {
        parent::__construct();
    }

    public function listCategory(){
        $catList = $this->db->select("SELECT * FROM category");
        return $catList;
        
    }
    
    public function addCategory(){
       $category = $_POST['newCategory'];
      $name =  $_FILES['catImage']['name'];
      $tmp_name = $_FILES['catImage']['tmp_name'];

        try{
        $this->db->insert('category',array(
            'category_name'=>$category,
            'image'=>$image
        ));
    }
    catch(PDOException $e){
        return "error inserting";
    }
    move_uploaded_file($tmp_name,CATEGORY_IMAGES.$image);
    return "Added successfully";
}
}
?>
