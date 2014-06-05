
<table>
    <tr>
        <th>Sr no</th>
        <th></th>
        <th>Product</th>
        <th>Quantity</th>
        <th>Price per item</th>
        <th>Total Price</th>
    </tr>
    
    
    <?php
    $num = 1;
    foreach($this->wishList as $k=>$item){
        ?>
    <tr>
        <td><?php echo $num; ?></td>
        <td><img src="<?php echo PRODUCT.$item['shop_id'].'/'.$item['image'] ?>" height='50px' width='50px'></td>
        <td><?php echo $item['name']?><br/><?php echo $item['description']?></td>
        <td><input type='text' value='<?php echo $item['quantity'] ?>' onchange='updateQuantity(this.value,<?php echo $item['product_id']?>)'></td>
        <td><?php echo $item['price']; ?></td>
        <td><?php echo $item['price'] * $item['quantity']?></td>
        <td><a href=''>Remove</a></td>
        <td>Add to cart</td>
    </tr>
    <?php
    $num++;
    }
    
    ?>
</table>


Delete all items
