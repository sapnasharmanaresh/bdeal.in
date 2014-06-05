<section class="row ">
    <div class='span_2_of_6'>
    </div>
    <div class='span_5_of_6_omega'>
    <?php
//print_r($this->prod);

foreach($this->shops as $key => $value){
  //  echo PRODUCT.$value['image'] ;
 ?>
<div class="product-div span_2_of_6">
    
    <a href="<?php echo BASEURL ?>shop/visit/<?php echo $value['shop_name']; ?>">
        <img src='<?php echo BASEURL.SHOPLOGO.$value['logo'];
	?>' height='200px' width='200px' ><hr/>
  <div class="product__name"><?php echo $value['shop_name']; ?></div> <hr/> </a>
 </div>
   
<?php
    }
?></div>
    <div class='clearfix'></div>
</section>
