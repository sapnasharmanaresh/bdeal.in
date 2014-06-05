 <?php 
 foreach($this->details as $key=>$detail){
    $logo =  $detail['logo'];
    $shop_name = $detail['shop_name'];
 }
 ?>
<div class="bar80">
    <div class="col span_6_of_6">
        <span class="logo span_2_of_6">

            <img src="<?php echo BASEURL.SHOPLOGO.($logo); ?>" height="100" width="100"/>
        </span>
        <span class='shop-name span_4_of_6'>
            <?php echo $shop_name; ?>
        </span>
    </div>
</div>