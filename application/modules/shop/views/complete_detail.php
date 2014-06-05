<table class="table">
    <tr>
        <th>Sr no</th>
        <th>Shop name</th>
        <th>Shop Description</th>
        <th>Owner Name</th>
        <th>Total sold items</th>
        <th>Revenue</th>
        <td></td>
    </tr>


    <?php
    $num = 1;
    foreach ($this->shops as $k => $shop){
?>
    <tr>
        <td><?php echo $num ;?></td>
        <td><img src="<?php echo UPLOADS.'shopLogo/'.$shop['logo'] ?>" height='50px' width="50px"><?php echo $shop['shop_name'] ?></td>
        <td><?php echo $shop['description'] ?></td>
        <td><?php echo $shop['owner_name']?></td>
    </tr>

        
    <?php
    $num++;
    }
    ?>


</table>

sold to whom details
<td>Item name</td>
<td>Stock ID</td>
<td>Stock received from</td>
<td>Date Item entered in mall</td>
<td>Customer name</td>
<td>Shipping address</td>
<td>Date sold</td>
    