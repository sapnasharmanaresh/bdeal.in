<?php // echo Hash::create('sha256', '9872639621', HASH_PASSWORD_KEY); ?>
<div class="wrapper">
<div class="main-content" style="margin-left: 100px;">
     
    <div id='register' class="user-register">
        <span class='register__text'>Request Form</span>
     
    <form name="request" action="<?php echo BASEURL; ?>ownerRequest/form" method="post" enctype="multipart/form-data">
     
        <table>
        <tr>
            <td> <input type="text" name="name" placeholder="Your name"></td>
        </tr>
        <tr>
            <td>   <input type="email" name="email" id="email" placeholder="email"><p id="result"></p></td>
        </tr>
        <tr>
            <td><input type="text" name="shopname" placeholder="shop name"></td>
        </tr>
        <tr>
            <td> <textarea rows="5" cols="40" name="shopdescription"></textarea></td>
       </tr>
       <tr>
           <td>
                 <input type="text" name="contact" placeholder="contact no">
           </td>
       </tr>
       <tr>
           <td> <input type="text" name="deal" placeholder="deal %"></td>
       </tr>
       <tr>
           <td>Product list with full info(.xls or .csv)<input type="file" name="product_list"><a class="btn" href="<?php echo BASEURL. PRODUCT_XLS ?>sample.xlsx">Check sample</a></td>
       </tr>
       <tr>
           <td>Upload product images folder (.zip)<input type="file" name="product_image"></td>
       </tr>
       <tr>
           <td>    <input type="submit" name="request" value="Send Request"></td>
       </tr>
    </table>
    </form>
  <div class="error"><?php if(isset($this->error)){
        echo $this->error;
        } ?></div>
    <p>If posted request then you can track ur request id</p><a class="btn-color3"href='<?php echo BASEURL; ?>ownerRequest/track'>Track</a>
    <?php
    ?>
</div>


<div class="lightbox">
    
</div>
<div class="lightbox-content">
    
</div>
</div>
</div>