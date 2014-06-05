<div class='nav-link-pos left'>
   <?php
   if(Session::get('role') == 'owner'){
       ?>
     <a href='<?php echo BASEURL; ?>owner/visitShop'>Visit Shop</a>
    <?php
   }
   ?>
</div>
<div class="nav-link-pos right">

    <?php include'vProfile.php' ?>

    <span class="separator">|</span>
    <a href='<?php echo BASEURL; ?>'>Bdeal Home</a>
    <?php 
    if(Session::get('role')=='customer'){
    ?>
        <span class="separator">|</span>
    <a href='<?php echo BASEURL.Session::get('role').'/'; ?>cart/cart'>Cart
        <script> cartCount();</script>
        <span id="cart"></span>
    </a>
   
        <span class="separator">|</span>
      <a href="<?php echo BASEURL; ?>wishlist/wishlist">Wishlist
            <script> listCount();</script>
            <span id="list"></span>
        </a>
        <?php
    }
        ?>
</div>






