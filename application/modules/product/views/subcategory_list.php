<section class="row ">
    <div class='span_2_of_6'>
    </div>
    <div class='span_5_of_6_omega'>
<?php
if(!empty($this->subcat)){
foreach($this->subcat as $k => $v) {
    ?>
    <div class='subcategory span_2_of_6'>
        <div class='subcategory__image'>
            <a href='<?php echo BASEURL.'product/category/'.$this->cat.'/'.$v['subcategory'] ?>'><img src="<?php echo BASEURL.SUBCATEGORY_IMAGES. $v['image'] ?>" height='200px' width='200px'></a>
        </div><hr>
        <div class='subcategory__name'>
            <a href='<?php echo BASEURL.'product/category/'.$this->cat.'/'.$v['subcategory'] ?>'><?php echo $v['subcategory']; ?></a>
        </div><hr/>
    </div>
    <?php
}
}
else{
    echo "No product yet";
}


?>
</div>
    <div class='clearfix'></div>
</section>
