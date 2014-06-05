<?php
class Mdl_search extends Model{

    function __construct() {
        parent::__construct();
    }
    
    public function byPriceH2L(){
        $this->db->select("SELECT * FROM product-detail ORDER BY price desc");
    }
     public function byPriceL2H(){
        $this->db->select("SELECT * FROM product-detail ORDER BY price asc ");
    }
     public function byBrand(){
        $this->db->select("SELECT * FROM product-detail where ");
    }
     public function byShop(){
        $this->db->select("SELECT * FROM product-detail,product where product.shop_id=$shop_name");
    }
    
    public function employee(){
        echo $value = $_POST['value'];
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
    }
    
    public function searchMain(){
        $search = $_GET['q'];
        $res = $this->db->select("SELECT subcategory.subcategory,category.category_name,`product-detail`.*
            FROM product LEFT JOIN `product-detail` on product.product_id=`product-detail`.product_id 
            LEFT JOIN category on category.category_id=product.category_id 
            LEFT JOIN subcategory on subcategory.id=product.subcategory_id
            LEFT JOIN shop on shop.shop_id=product.shop_id 
            where `product-detail`.name LIKE '%$search%' or 
            `category`.category_name LIKE '%$search%' or
            subcategory.subcategory LIKE '%$search%' or 
            `product-detail`.description LIKE '%$search%'");
    //   print_r($res);
       return $res;
    }
    
    public function searchSidebar($cat_name,$subcat_name){
        
        $product = $this->db->select("SELECT * from subcategory LEFT JOIN category on category.category_id=subcategory.category_id where subcategory.subcategory='$subcat_name'and category.category_name='$cat_name'");
        //print_r($res);
        return $product;
       
    }

}