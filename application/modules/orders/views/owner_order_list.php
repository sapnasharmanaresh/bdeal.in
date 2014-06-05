<table class='table'>
    <tr>
        <th>Sr no.</th>
        <th>Order_no</th>
        <th>Status</th>
        <th>Order_items
                     
        </th>
        <th>Date of Placement</th>
        <th>Date of Delivery</th>
        <th>Total Bill</th>
        <th>Payment Mode</th>
        <th>Shipping Details
              
        </th>
</tr
<?php
$i = 1;
foreach($this->res as $key=>$value){
?>
<tr>
    <td><?php echo $i; ?></td>
     <td><?php echo $value['order_id'] ?></td>
        <td><?php echo $value['status'] ?></td>
           <td><?php echo $value['ordered-items'] ?>
           <table>
                         <td><!-- item name --></td>
                         <td><!-- item detail --></td>
                         <td><!-- item price --></td>
                     </table>
    
           </td>
            <td><?php echo $value['date-of-placement'] ?></td>
             <td><?php echo $value['date-of-delivery'] ?></td>
              <td><?php echo $value['total-price'] ?></td>
               <td><?php echo $value['payment-method'] ?></td>
                <td>
                  <table>
                   <tr>
                      <td>Shipping Address</td>
                      <td><?php  echo $value['shipping-address']  ?></td>
                   </tr>
                   <tr>
                      <td>Customer_name</td>
                      <td></td>
                   </tr>
                   <tr>
                    <td>Email</td>
                    <td></td>
                   </tr>
                   <tr>
                    <td>Contact</td>
                    <td></td>
                   </tr>
                </table>
                </td>
    
</tr>
<?php
}
?>
</table>