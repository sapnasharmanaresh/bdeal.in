<section class="row ">
    <div class='span_2_of_6'>
    </div>
    <div class='span_5_of_6_omega'>
<?php
if(!empty($this->cat)){
foreach($this->cat as $k => $v) {
    ?>
   
    <div class='block-div span_2_of_6'>
        <div class='block__image'>
            <a href='<?php echo BASEURL ."product/category/".$v['category_name']; ?>' ><img src='<?php echo BASEURL.CATEGORY_IMAGES.$v['image'] ?>' height='200px' width='200px' ></a>
        </div><hr/>
        <div class='block__name'>
            <a href='<?php echo BASEURL ."product/category/".$v['category_name']; ?>' > <?php echo $v['category_name']; ?></a>
        </div><hr/>
    </div>
    <?php
}
}
else{
    echo "No products";
}
?>
</div>
    <div class='clearfix'></div>
</section>

