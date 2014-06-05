<?php
class Mdl_subCategory extends Model {

    function __construct() {
        parent::__construct();
    }

    public function selectSubCat(){
        $cat = $_POST['category'];
      $subcat =   $this->db->select("SELECT * FROM subcategory where category_id='$cat'");
      return $subcat;
      
    }
    
    public function addSubCategory(){
        $maximumPrice =  $_POST['maximumPrice'];
        $minimumPrice = $_POST['minimumPrice'];
        $category_id = $_POST['cat'];
         $subcategory =  $_POST['newSubCategory'];
         $image = $_FILES['subcatImage']['name'];
         $tmp_im = $_FILES['subcatImage']['tmp_name'];
         $ext = pathinfo($image,PATHINFO_EXTENSION);
         try{
         $this->db->insert('subcategory',array(
             'category_id' => $category_id,
             'subcategory'=>$subcategory,
             'minimum_price'=>$minimumPrice,
             'maximum_price' => $maximumPrice,
             'image'=>$subcategory.'.'.$ext
         ));
         }
         catch(PDOException $e){
             return 'error creating subcategory';
         }
         move_uploaded_file($tmp_im, SUBCATEGORY_IMAGES.$subcategory.'.'.$ext);
         return 'New Subcategory created';
    }
}
?>
