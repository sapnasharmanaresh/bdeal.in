
</section>

<section class="section2">
    <img class="img" src="<?php echo IMAGE ?>welcome.jpg" height="10%" width=100%">
</section>
<?php
/**
 * leave section for advertisement 
 */
?>
<section class="section3">
    <?php Modules::run('advertisement','welcomePage');?>
    <!--<img class="img" src="<?php echo ADVERTISEMENT ?>1.jpg" height="20%" width=30%">
   <img class="img" src="<?php echo ADVERTISEMENT ?>2.jpg" height="20%" width=30%">
   <img class="img" src="<?php echo ADVERTISEMENT ?>3.jpg" height="20%" width=30%">
-->
</section>
<hr/>
<section class="section4">

    <div class="block">
        <div class="block__head">Electronics        </div>
        <div class="block__body">
            <?php Modules::run('product', 'display_thumbnail',array('Electronics')); ?>
        </div>
    </div>
  </section>
<hr/>
<section class="section5">
    <div class="block">
        <div class="block__head">Books        </div>
        <div class="block__body">
            <?php Modules::run('product', 'display_thumbnail',array('Books')); ?>
        </div>
    </div>
   
</section>
<hr/>
<section class="section6">
   <div class="block">
        <div class="block__head">Fashion        </div>
        <div class="block__body">
            <?php Modules::run('product', 'display_thumbnail',array('Fashion')); ?>
        </div>
    </div>
</section>
<hr/>

<section class="section6">
   <div class="block">
        <div class="block__head">Others</div>
        <div class="block__body">
            <?php Modules::run('product', 'display_thumbnail',array('Others')); ?>
        </div>
    </div>
</section>
