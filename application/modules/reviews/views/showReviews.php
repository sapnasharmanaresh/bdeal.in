<hr/>
<div class="block">
    <div class="block__head">         
        <span class="span_3_of_6"> Name</span>
        <span >Review</span>
    </div>
</div>
<?php
foreach ($this->reviews as $k => $review) {
    ?>
    <div class="review">
        <div class="review__head span_2_of_6">    <?php echo $review['reviewHead']; ?></div>
        <div class="review__body span_4_of_6"><?php echo $review['review']; ?></div>

    </div>

<hr/>
    <?php
}
?>


