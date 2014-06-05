


    <?php
    foreach ($this->results as $k => $result) {
        ?>
<div class="searched_product span_4_of_6">
        <div class="searched_product__image span_2_of_6">
            <img src="<?php echo PRODUCT . $result['image'] ?>" height= '200px' width='200px' >
        </div>
        <div class='searched_product__detail span_4_of_6 '>
            <div class="searched_product__head">
                <a href='<?php echo BASEURL."product-detail?id=".$result['product_id']?>'> <?php echo $result['name'] ?></a>
            </div> 
            <div class='searchedProduct__info'>
                <table>
                    <tr>
                        <td>Description:</td>
                        <td><?php echo $result['description']; ?></td>
                    </tr> 
                    <tr>
                        <td>Category</td>
                        <td><?php echo $result['category_name']; ?></td>
                    </tr>
                    <tr>
                        <td>Subcategory</td>
                        <td><?php echo $result['subcategory'] ?></td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td><?php echo $result['price'] ?></td>
                    </tr>
                </table>
            </div>

        </div>
</div>

        <?php
    }
    ?>

