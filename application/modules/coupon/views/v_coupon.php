<a  class='btn btn-color3'href="<?php echo BASEURL?>owner/addCoupon">Add new</a>

Available Coupons are
<table class='table'>
    <tr>
        <th>Sr no</th>
        <th>Coupon</th>
        <th>Discount</th>
        <th>Operations</th>
    </tr>
  
    <?php
  $num = 1;
    foreach($this->coupons as $k => $coupon){
    ?>
    <tr>
        <td><?php echo $num ;?></td>
        <td><?php echo $coupon['coupon_name'] ?></td>
        <td><?php echo $coupon['discount']; ?></td>
        <td><a href="">Edit</a><a href="">Delete</a></td>
    </tr>
<?php
$num++;
}
    ?>
 </table>
   