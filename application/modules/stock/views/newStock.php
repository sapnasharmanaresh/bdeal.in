Status of previous week

<?php
if (empty($this->stock)) {
    echo "No stock in mall for past week";
} else {
    ?>
    <table class="table">
        <tr>
            <th>Sr no</th>
            <th>Stock_id</th>
            <th>Shop name</th>
            <th>Amount</th>
            <th>Product Categories</th>
            <th>quantity</th>
            <th>Date</th>
        </tr>
<?php
  $num = 1;
foreach($this->stock as $k=>$st){
  ?>
        <tr>
            <td><?php echo $num; ?></td>
            <td><?php echo $st['stock_id'] ?></td>
            <td><?php echo $st['shop_name'] ?></td>
            <td><?php echo $st['amount']; ?></td>
            <td><?php echo $st['categories']?></td>
            <td><?php echo $st['quantity'] ?></td>
            <td><?php echo $st['dateOfPurchase'] ?></td>
        </tr>
        <?php
}
?>
    </table>
    <?php
}
?>