<?php

class Mdl_product extends Model {

    public function __construct() {
        //echo "jjop";
        parent::__construct();
    }

    public function display_product($category=null) {
        $prod = $this->db->select('SELECT product.*,detail.*,user.id as owner_id
            FROM product,shop,user ,`product-detail` as detail where product.product_id = detail.product_id and
            product.shop_id=shop.shop_id and shop.owner_id= user.id ORDER BY rand() LIMIT 5
');
//        SELECT product.*,detail.*,user.id as owner_id
//            FROM product,shop,user ,`product-detail` as detail where product.product_id = detail.product_id and
//            product.shop_id=shop.shop_id and shop.owner_id= user.id product.category_id=(SELECT  category_id from category where category_id=(SELECT submenu_cat_id from submenus where menu_id=(SELECT id FROM topnav where name='$category') )) ORDER BY rand() LIMIT 5
        return $prod;
    }

    public function display_detail($product_id) {
     
        $detail = $this->db->select("SELECT product.*,detail.*,category.category_name,subcategory.subcategory,shop.shop_name                                                       
                                                            FROM product 
               	LEFT JOIN category 
                ON category.category_id = product.category_id 
               LEFT JOIN subcategory 
               ON category.category_id = subcategory.category_id 
                and product.subcategory_id=subcategory.id 
                LEFT OUTER JOIN `product-detail` as detail 
               ON product.product_id = detail.product_id
				LEFT JOIN shop ON 
					product.shop_id=shop.shop_id
                 where product.product_id = '$product_id'");
        return $detail;
    }

    public function category() {


        $this->db->select("SELECT product.*,detail.*,category.category_name,subcategory.subcategory                                                       FROM product "
                . "LEFT JOIN category "
                . "ON category.category_id = product.category_id "
                . "LEFT JOIN subcategory "
                . "ON category.category_id = subcategory.category_id "
                . "and product.subcategory_id=subcategory.id "
                . "LEFT OUTER JOIN `product-detail` as detail "
                . "ON product.product_id = detail.product_id"
                . " where product.product_id = $category_id ");
    }

    public function owner_product_list() {
        $user_id = Session::get('user_id');
        $res = $this->db->select("SELECT * from product,`product-detail`,category,subcategory 
            where product.shop_id = (SELECT shop_id from shop where owner_id='$user_id') and product.product_id = `product-detail`.product_id and 
            product.category_id=category.category_id and subcategory.id=product.subcategory_id");
        return $res;
    }

    public function add_product() {
        $prod_name = $_POST['product_name'];
        $prod_description = $_POST['description'];
        $category = $_POST['cat'];
        $subcategory = $_POST['subcat'];
        $price = $_POST['price'];
        $tmp_image = $_FILES['prod_image']['tmp_name'];
        $shop_id = $_SESSION['shop_id'];
        $quantity = $_POST['quantity'];
        $image = $_FILES['prod_image']['name'];

        $ext = pathinfo($image, PATHINFO_EXTENSION);
        try {
            $this->db->insert('product', array(
                'category_id' => $category,
                'subcategory_id' => $subcategory,
                'shop_id' => $shop_id,
                'quantity' => $quantity,
                'timestamp' => date('Y-m-d')
            ));
            $id = $this->db->lastInsertId();
            $this->db->insert('`product-detail`', array(
                'product_id' => $id,
                'name' => $prod_name,
                'description' => $prod_description,
                'image' => "$id.$ext",
                'price' => $price
            ));
            move_uploaded_file($tmp_image, DIRECTORY_PRODUCT . "$id.$ext");
        } catch (PDOException $e) {
            $msg = 'Problem adding product';
        }
        $msg = 'Product has been added successfully';
        return $msg;
    }

    public function detail($menu_name) {
	//echo 'he';
	if($menu_name=='Shops'){
		$cat = $this->db->select("SELECT * FROM shop");
		//print_r($cat);
		return $cat;
	}
    else{    $menu_id = $this->db->select("SELECT id from topnav where name='$menu_name'");
        $menu_id = $menu_id[0]['id'];
        $cat = $this->db->select("SELECT * FROM category LEFT JOIN submenus on category.category_id=submenus.submenu_cat_id
                    where submenus.menu_id='$menu_id'");
        //print_r($cat);
        return $cat;
    }
	}

    public function uploadProduct() {
        $shop_id = Session::get('shop_id');

        $name = $_FILES['uploadProduct']['name'];
        $tmp = $_FILES['uploadProduct']['tmp_name'];

        $name_images = $_FILES['uploadImages']['name'];
        $tmp_images = $_FILES['uploadImages']['tmp_name'];
        $ext = pathinfo($name, PATHINFO_EXTENSION);
        $ext_images = pathinfo($name_images, PATHINFO_EXTENSION);
        move_uploaded_file($tmp_images, PRODUCT_XLS . $shop_id . '.' . $ext_images);

        // Modules::run('zipArchived','openZip',array(PRODUCT_XLS.$shop_id.'.'.$ext_images)); 
        //echo PRODUCT_XLS.$shop_id.".".$ext;
        chmod(PRODUCT_XLS . $shop_id . "." . $ext, 0777);
        if (file_exists(PRODUCT_XLS . $shop_id . "." . $ext))
            unlink(PRODUCT_XLS . $shop_id . "." . $ext);
        move_uploaded_file($tmp, PRODUCT_XLS . $shop_id . "." . $ext);


        $filename = $shop_id . "." . $ext;
        return $filename;
    }

    public function subcategory_list($name) {
        $subcat = $this->db->select("SELECT * FROM subcategory where category_id=(SELECT category_id from category where category_name='$name')");
        return $subcat;
    }

    public function product_list($cat_name, $subcat_name) {
        $res = $this->db->select("SELECT * FROM product LEFT JOIN `product-detail` on product.product_id=`product-detail`.product_id
               where category_id=(SELECT category_id from category where category_name='$cat_name') and subcategory_id=
                (SELECT id from subcategory where subcategory='$subcat_name')");
        //print_r($res);
        return $res;
    }

}

?>
