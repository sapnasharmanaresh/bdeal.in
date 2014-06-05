<?php
//print_r($this->prod);
if(!empty($this->products)){
foreach($this->products as $key => $product){
  //  echo PRODUCT.$value['image'] ;
 ?>
<div class="block-div span_1_of_6">
    
    <a href="<?php echo BASEURL ?>product/display_detail?id=<?php echo $product['product_id']; ?>">
        <img src='<?php echo BASEURL.PRODUCT.$product['image'];
	?>' height='100px' width='100px' >
  <div class="block__name"><?php echo $product['name']; ?></div>  </a>
  <hr/>
  Price:<?php echo $product['price']; ?><hr>
</div>
  
<?php
    }
}
else{
    echo "No product in this subcategory";
}
?>
