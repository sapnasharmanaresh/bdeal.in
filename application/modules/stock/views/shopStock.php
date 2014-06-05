<table class='table'>
    <tr>
        <th>Sr no</th>
        <th>Stock_id</th>
        <th>Vendor</th>
        <th>Vendor Address</th>
        <th>Amount</th>
        <th>Date of Purchase</th>
    </tr>
    <?php
    $i = 1;
    foreach($this->shopStock as $k=>$v){
        $vendor = $v['vendor_name'];
        $vendor_address = $v['vendor_address'];
        $stock_id = $v['stock_id'];
        $amount = $v['amount'];
        $dateOfPurchase = $v['dateOfPurchase'];
    
    ?>
    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $stock_id; ?></td>
        <td><?php echo $vendor; ?></td>
        <td><?php echo $vendor_address; ?></td>
        <td><?php echo $amount ?></td>
        <td><?php echo $dateOfPurchase ?></td>
    </tr>
    <?php
    $i++;
    
    }
    ?>
</table>