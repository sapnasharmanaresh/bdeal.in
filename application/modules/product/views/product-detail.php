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
            <img src='<?php echo BASEURL.PRODUCT . $value['image'] ?>' height='200px' width='200px' >

        </div>
        <div class="product-description span_4  _of_6">
            <h2><span class="product-name"> <?php echo $value['name']; ?></span></h2>
            <span class="rating">
                <?php Modules::run('rating', 'get_rating', array($value['product_id'])); ?>
            </span>
            <script>countReviews(<?php echo $value['product_id'] ?>);</script>
            <span id="reviews__number"></span>Reviews
            <span class="write-review">Write a review</span>
            <?php Modules::run('reviews', 'writeReview', array($value['product_id'])); ?>
            <script>
                showReviews(<?php echo $value['product_id'] ?>);
            </script>
            <div id="showReviews"></div>
            <span class="rating" ><a href="#rate">Rate this product</a></span>
            <span class="Add to Wishlist"><button onclick ="addToList(<?php echo $value['product_id'] ?>);
                        return false;">Add to Wishlist</button></span>
            <hr/>
            <span class=""><a href='<?php echo BASEURL.'pdf/generate?id='.$value['product_id'] ?>'>Generate Pdf</a></span>
            
            <span><a href=''>Email to friend</a>
                    <input type="email" name="mailProdDesc" id="mailProdDesc">
                    <button onclick='sendProdDesc()'>Send</button>
            
            </span>
            <hr/>
            <h3><p class="price">Rs. <?php echo $value['price']; ?></p></h3>
            <span class="description"><?php echo $value['description']; ?></span>
            <span class="status"><?php echo $value['status']; ?></span>
            <a class='absolute button button-shop' href="<?php echo BASEURL . 'product/shop/' . $value['shop_name'] . '?prod_id=' . $value['product_id']; ?>">Visit Shop</a>
            <button class='absolute button button-buy' onclick="cart(<?php echo $value['product_id'] ?>)">Add to cart</button>
        </div>
    </div>
    <div id="rate">
    <?php Modules::run('rating', 'set_rating'); ?>
</div>

<div class="priceAlert">
    <?php Modules::run('priceAlert','setPriceAlert',array($value['product_id']));  ?>
</div>
        <?php
    }
    ?>
</div>


