<table clas='table'>
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
    foreach($this->cart as $k=>$item){
        ?>
    <tr>
        <td><?php echo $num; ?></td>
        <td><img src="<?php echo PRODUCT.$item['shop_id'].'/'.$item['image'] ?>" height='50px' width='50px'></td>
        <td><?php echo $item['name']?><br/><?php echo $item['description']?></td>
        <td><input type='text' value='<?php echo $item['quantity'] ?>' onchange='updateQuantity(this.value,<?php echo $item['product_id']?>)'></td>
        <td><?php echo $item['price']; ?></td>
        <td><?php echo $item['price'] * $item['quantity']?></td>
        <td>Remove</td>
    </tr>
    <?php
    $num++;
    }
    
    ?>
</table>
Remove all items

<hr/>
Total Price <?php echo $item['total_price']; ?>
Apply Coupon <input type='text' name='applyCoupon'>

After Discount <?php  ?>

Proceed for checkout <button onclick='checkout'>Checkout</button>