<?php
if(empty($this->sales)){
    echo "No product is sold yet";
}
else{
    ?>

<table class="table">
    <tr>
        <th>Sr no</th>
        <th>Shop name</th>
        <th>Client Name</th>
        <th>Shipping Address</th>
        <th>Sold items</th>
        <th>Total price</th>
        <th>Date of delivery</th>
    </tr>
    
    <?php
    $num = 1;
    foreach($this->sales as $k=>$sale){
     ?>
        <tr>
            <td><?php echo $num ?></td>
            <td><?php echo $sale['shop_name']; ?></td>
            <td><?php echo $sale['client_name']; ?></td>
            <td><?php echo $sale['shipping-address']; ?></td>
            <td><?php echo $sale['ordered-items']; ?></td>
            <td><?php echo $sale['total-price'];?></td>
            <td><?php echo $sale['date-of-delivery']?></td>
        </tr>
    <?php
    $num++;
    
    }
    ?>
</table>
<?php
}
        
        ?>