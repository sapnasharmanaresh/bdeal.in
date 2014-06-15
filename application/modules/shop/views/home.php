</section>
<?php
/**
 * Here one banner will be displayed 
 */
?>
<section class='section2'>
    <img src='<?php echo BASEURL.SHOPBANNER.'banner1.jpg' ?>'
</section>


<?php
/**
 * Beside that banner space for advertisement will be there
 */
?>
<section class="section3">
<?php Modules::run('advertisement','shopAdver')?>    
</section>

<?php
/**
 * ALl the products of the shop are put in an array say products and then those are shown at its home
 * 
 * 
 */
?>

<section class="section4">
            <?php Modules::run('product', 'display_thumbnail',array('Electronics')); ?>
</section>
<!--Other products are 
<section class="row ">
    <div class='span_2_of_6'>
    </div>
    <div class='span_5_of_6_omega'>
<?php
if(!empty($this->products)){
foreach($this->products as $k => $v) {
    ?>
   
    <div class='block-div span_1_of_6'>
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
-->

    



