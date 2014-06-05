<?php // echo Hash::create('sha256', '9872639621', HASH_PASSWORD_KEY); ?>
<div class="content">
    <h1>Request Form</h1>
    <form name="request" action="<?php echo BASEURL; ?>ownerRequest/form" method="post" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Your name"><br/>
        <input type="email" name="email" id="email" placeholder="email"><p id="result"></p><br/>
        <input type="text" name="shopname" placeholder="shop name"><br/>
        <textarea rows="5" cols="15" name="shopdescription"></textarea><br/>
        <input type="text" name="contact" placeholder="contact no"><br/>
        <input type="text" name="deal" placeholder="deal %"><br/>
        Product list with full info(.xls or .csv)<input type="file" name="product_list"><br/>
        Upload product images folder (.zip)<input type="file" name="product_image"><br/>
        <input type="submit" name="request" value="Send Request"><br/>
    </form>
    <br/><br/><br>
    <p>If posted request then you can track ur request id</p><a href='<?php echo BASEURL; ?>ownerRequest/track'>Track</a>
    <?php
    ?>
</div>


<div class="lightbox">
    
</div>
<div class="lightbox-content">
    
</div>