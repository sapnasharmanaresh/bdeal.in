<?php

class Mdl_uploadList extends Model {

    function __construct() {
        parent::__construct();
    }

    public function upload($filename,$id=false) {
        //echo THIRD_PARTY . 'excel/PHPExcel/IOFactory.php';
       if($id==false){
        $shop_id = Session::get('shop_id');
       }
       else{
           $shop_id = $id;
       }
        $inputFileName = PRODUCT_XLS . "$filename";
       // echo $inputFileName;
        try {
            $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
        } catch (Exception $e) {
            die('Error loading file :' . $e->getMessage());
        }

        $sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
        $num = count($sheetData);
        //   echo $num . "<br/>";
//echo $sheetData[5]['A'];
       // echo "<br>";
        //  print_r($sheetData);

        for ($i = 1; $i <= $num; $i++) {
          //  echo "<br/>$i<br/>";
            if ($sheetData[$i]['A'] == NULL || $sheetData[$i]['B'] == NULL) {
                //echo "null";
                $sheetData[$i]['A'] = NULL;
                $sheetData[$i]['B'] = NULL;
            } else {
                //    echo strtoupper($sheetData[1]['G']) == strtoupper('price');
                if (strtoupper($sheetData[1]['A']) == strtoupper('Sr no') && strtoupper($sheetData[1]['B']) == strtoupper('Category') && strtoupper($sheetData[1]['C']) == strtoupper('Sub-category') &&
                        strtoupper($sheetData[1]['D']) == strtoupper('Product_name') && strtoupper($sheetData[1]['E']) == strtoupper('prod_desc') && strtoupper($sheetData[1]['F']) == strtoupper('image') && strtoupper($sheetData[1]['G']) == strtoupper('price')) {

                    $cat = $this->category();
                    //print_r($cat);
                    //    echo $num;
                    if ($i > 1) {
                        $flag1 = 0;
                        foreach ($cat as $n => $c) {


                            //     echo $c['category_name'];
                            //  echo $sheetData[$i]['B'];
                            if ($c['category_name'] == $sheetData[$i]['B']) {
                                //          echo "exists";

                                $flag1 = 1;
                                break;
                            }
                        }
                        if ($flag1 == 0) {
                           // echo "no";
                            $res = $this->db->insert('category', array(
                                'category_name' => $sheetData[$i]['B']
                            ));
                        }

                        $subCat = $this->subcategory();
                        $flag2 = 0;
                        foreach ($subCat as $n => $c) {

                            //echo "<br/>";
                         //   echo $c['category_name'];
                            //echo $sheetData[$i]['B'];
                            //echo $c['subcategory'];

                            //echo $sheetData[$i]['C'];
                           
                            // echo "<br/>";
                            if ($c['category_name'] == $sheetData[$i]['B'] && $c['subcategory'] == $sheetData[$i]['C']) {
                         //       echo "exists";

                                $flag2 = 1;
                                break;
                            }
                        }
                      //  echo $flag2;
                        $res = $this->db->select("SELECT category_id from category where category_name='" . $sheetData[$i]['B'] . "'");
                        $cat_id = $res[0]['category_id'];
                        if ($flag2 == 0) {


                      //      echo "insert";
                            $this->db->insert('subcategory', array(
                                'category_id' => $cat_id,
                                'subcategory' => $sheetData[$i]['C']
                            ));
                        }


                        $subCatId = $this->db->select("SELECT id from subcategory
                                                                            where category_id=(SELECT category_id from category where category_name='" . $sheetData[$i]['B'] . "') and 
                                                                                subcategory='" . $sheetData[$i]['C'] . "'");
             
                        $subCat_id = $subCatId[0]['id'];
                                            
                          $this->db->insert('product', array(
                            'category_id' => $cat_id,
                            'subcategory_id' => $subCat_id,
                            'shop_id' =>$shop_id,
                            'timestamp' => date('Y-m-d H:i:s')
                            ));
                              
                        $id = $this->db->lastInsertId();
            
                        if($sheetData[$i]['F'] !=''){
                            $im = $sheetData[$i]['F'];
                            $im_ext = pathinfo($im,PATHINFO_EXTENSION);
                        }
                        else{
                            $im = '../product-default.jpg';
                        }
                            $this->db->insert('`product-detail`', array(
                                'product_id'=>$id,
                                'name'=>$sheetData[$i]['D'],
                                'description' =>$sheetData[$i]['E'],
                               'image'=>$id.'.'.$im_ext,
                                'price'=>$sheetData[$i]['G']
                            ));
                        }
                        }
                 
    }
        }
    }
        
    

    function prod_list($filename,$id) {
       $this->upload($filename,$id);


// $this->db->insert('pro');
    }

    public function category() {
        $cat = $this->db->select('SELECT category_name from category');
        return $cat;
    }

    public function subcategory() {
        $subCat = $this->db->select("SELECT category.category_name,subcategory.subcategory from category,subcategory where category.category_id=subcategory.category_id");
        // print_r($subCat);
        return $subCat;
    }

}

?>
