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
        <td><img src="<?php echo BASEURL.UPLOADS.'shopLogo/'.$shop['logo'] ?>" height='50px' width="50px"><?php echo $shop['shop_name'] ?></td>
        <td><?php echo $shop['shop_desc'] ?></td>
        <td><?php echo $shop['owner_name']?></td>
        <td><?php echo $shop['']?></td>
    </tr>

        
    <?php
    $num++;
    }
    ?>

</table>
<table class=table>
<tr>
	<th>Item name</th>
	
<th>Stock ID</th>
<th>Stock received from</th>
<th>Date Item entered in mall</th>
<th>Customer name</th>
<th>Shipping address</th>
<th>Date sold</th>
</tr>
 <?php
    $num = 1;
    foreach ($this->shops as $k => $shop){
?>
<tr>
	<td width='100px'><?php echo $shop['name'] ?></td>
	<td><?php echo $shop['stock_id'] ?></td>
	<td><?php echo $shop['vendor_name']?></td>
	<td><?php echo $shop['timestamp']?></td>
	<td><?php echo $shop['customer_name']?></td>
	<td><?php echo $shop['shipping-address']?></td>
	<td><?php echo $shop['date-of-delivery']?></td>
</tr>
  <?php
    $num++;
    }
    ?>
</table>



    
