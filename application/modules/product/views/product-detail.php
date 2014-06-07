<div class="container">
    <?php
    foreach ($this->detail as $key => $value) {
        ?>
        <div class="link">
            <a href="<?php echo BASEURL; ?>">
                <?php echo "Home"; ?>
            </a>/
            <a href="<?php echo BASEURL . 'product/category/' . $value['category_name']; ?>">
                <?php echo $value['category_name']; ?>
            </a>/
            <a href="<?php echo BASEURL . 'product/category/' . $value['category_name'] . '/' . $value['subcategory']; ?>">
                <?php echo $value['subcategory']; ?>
            </a>
        </div>
        <div>
            <div class='product-image span_2_of_6'>
                <img src='<?php echo BASEURL . PRODUCT . $value['image'] ?>' height='200px' width='200px' >

            </div>
            <div class="product-description span_3_of_6">
                <h2><span class="product-name"> <?php echo $value['name']; ?></span></h2>
                <span class="rating">
                    <?php Modules::run('rating', 'get_rating', array($value['product_id'])); ?> Ratings
                </span>
                <span class='separator'>|</span>
                <script>countReviews(<?php echo $value['product_id'] ?>);</script>
                <span id="reviews__number"></span>Reviews
                <div class='right'>
                    <span class="write-review"><a href='#review'>Write a review</a></span>
                    <span class='separator'>|</span>
                    <span class="rating" ><a href="#rate">Rate this product</a></span>
                    <span class='separator'>|</span>
                    <span class="Add to  Wishlist"><a href='' onclick ="addToList(<?php echo $value['product_id'] ?>);
                            return false;">Add to Wishlist</a></span>
                </div>
                <hr/>

                <div class="description"><?php echo $value['description']; ?></div>
                <h2><p class="price">Rs. <?php echo $value['price']; ?></p></h2>
                <button class='absolute button button-buy btn btn-color3' onclick="cart(<?php echo $value['product_id'] ?>)">Add to cart</button>

                <div class='right availability__group'>                
                    <?php if($value['status']=='Available'){ ?>
                    <p class="status success"><?php
                    }else{?>
                    <p class='status fail'>
                   <?php }
                    ?><?php echo $value['status']; ?></p>
                    <a class='absolute button-shop' href="<?php echo BASEURL . 'product/shop/' . $value['shop_name'] . '/' . $value['product_id']; ?>">Visit Shop</a>
                </div>
                <hr/>


            </div>
            <div class='side-block span_1_of_6'>
                <div class=' generate_pdf'>
                    <span class=""><a href='<?php echo BASEURL . 'pdf/generate?id=' . $value['product_id'] ?>'>Generate Pdf</a></span>
                </div><hr/>
                <div class=' emailToFriend'>
                    <p><a>Email to friend</a></p>
                    <p><input type="email" name="mailProdDesc" id="mailProdDesc"></p>
                    <button class='btn' onclick='sendProdDesc()'>Send</button>

                    </span>
                </div><hr/>
                <a>Set Price Alert</a>
                <div class="priceAlert">
                    <?php Modules::run('priceAlert', 'setPriceAlert', array($value['product_id'])); ?>
                </div>
            </div>
        </div>
     <div class="block">
        <div class="block__head" id='review'>Reviews about the product</div>
        <div class="block__body container80 ">
      
            <?php Modules::run('reviews', 'writeReview', array($value['product_id'])); ?>
        </div>
     </div>
    
        <script>
                    showReviews(<?php echo $value['product_id'] ?>);
        </script>
        <div id="showReviews"></div>

        <?php
    }
    ?>
</div>


