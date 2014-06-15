<?php

/*
 * List of all the employees of specific owner
 */
?>


<?php

if (isset($GET['id'])) {
    $detail_id = $_GET['id'];
    ?>
    <div id="detail">
        <div id="image">
            <img src="<?php BASEURL.IMAGE . $value['image'] ?>">
        </div>
        <div id="info">
            <p>Firstname:<?php $value['firstname'] ?></p>
            <p>Lastname:<?php $value['lastname'] ?></p>
            <p>Gender<?php $value['gender'] ?></p>
            <p>Email id:<?php $value['email'] ?></p>
            <p>Address::<?php $value['address'] ?></p>
            <p>City:<?php $value['city'] ?></p>
            <p>Pincode:<?php $value['pincode'] ?></p>
            <p>Country:<?php $value['country'] ?></p>

            <p>Contact:<?php $value['contact'] ?> </p>

            <a href="#mail">Send Mail</a>
             <select>
                <option>Warning</option>
                <option>Compose </option>
                <option>Order Confirmation</option>
            </select>
         <p>List of all the orders
            <table>
                <tr>
                    <td>Order no.</td>
                  <?php /*
                   * here comes list of items with their complete detail
                   * product_name,product_description,image
                   * quantity
                   * price
                   */
                  ?>
                        <td>Order Detail</td>
                    <td>Date of placement</td>
                    <td>Date of delivery</td>
                    <td>Shipping Address</td>
                    <td>Payment-method</td>
                    <td>Price</td>
                    
                </tr>
                
                <tr>
                    <td><?php echo "Order no"; ?></td>
                    <td></td>
                    <td></td>
                </tr>
            </table></p>
            <a href="#mail">Send Mail</a>
            <select>
                <option>Warning</option>
                <option>Compose </option>
            </select>
        
        </div>
    </div>
    <div id="mail"><?php Modules::run('mail', '') ?></div>
    <?php
}
?>
   <?php
   /**
    * Here need to put code so that it can search returned $res data  for the entered value 
    */
   ?>
    
    Search<input type="text" name="search-table"> 
  List of all the Customers
<table class='table'>
    <tr>
        <th>Sr no</th>
        <th>Customer_name</th>
        <th>Current Order</th>
        <th>Details</th>
    </tr>
    <?php
    $i = 1;
    foreach ($this->res as $key => $value) {
        ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $value['username']; ?></td>
            <td><?php echo $value['ordered-items'] ?></td>
            <td><a href="<?php echo BASEURL ?>owner/customer/<?php echo $value['id']; ?>">More Details</a></td>

        </tr>
   

    <?php
    $i++;
}
?>
 </table>
