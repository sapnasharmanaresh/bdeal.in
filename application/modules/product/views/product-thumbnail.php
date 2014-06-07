<?php
//print_r($this->prod);
foreach($this->prod as $key => $value){
  //  echo PRODUCT.$value['image'] ;
 ?>
<div class="product-div span_1_of_6">
    
    <a href="product/display_detail/<?php echo $value['product_id']; ?>">
        <img src='<?php echo PRODUCT.$value['image'];
	?>' height='100px' width='100px' >
  <div class="product__name"><?php echo $value['name']; ?></div>  </a>
  <hr/>
  Price:<?php echo $value['price']; ?>
</div>
   
<?php
    }
?>
