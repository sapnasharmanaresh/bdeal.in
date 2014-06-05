<?php
foreach($this->reviews as $k=>$review){
    

?>
<div class="review">
    <div class="review__head">    <?php echo $review['reviewHead']; ?></div>
    <div class="review__body"><?php echo $review['review'] ; ?></div>
    
</div>

<?php
}
?>