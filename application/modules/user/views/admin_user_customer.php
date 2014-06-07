
<?php

if (isset($this->detail_id)) {
    $detail_id = $this->detail_id;
    foreach($this->detail as $k => $v)
    ?>
    <div id="emp-detail">
        <div id="image">
            <img src="<?php echo PROFILE_IMAGE . $v['image'] ?>">
        </div>
        <div id="info">
            <p>Firstname:<?php echo $v['firstname'] ?></p>
            <p>Lastname:<?php echo $v['lastname'] ?></p>
            <p>Gender<?php echo  $v['gender'] ?></p>
            <p>Email id:<?php echo $v['email'] ?></p>
            <p>Address::<?php echo $v['address'] ?></p>
            <p>City:<?php echo $v['city'] ?></p>
            <p>Pincode:<?php echo  $v['pincode'] ?></p>
            <p>Country:<?php echo $v['country'] ?></p>

            <p>Contact:<?php echo $v['contact'] ?> </p>
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
            Account status<select>
                <option <?php if($v['status']=='Enable') echo"selected";?>>Enable</option>
                <option <?php if($v['status']=='Disable') echo"selected";?>>Disable</option>
                <option>Delete</option>
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
            <td><a href="/<?php echo $value['id']; ?>">More Details</a></td>

        </tr>
   

    <?php
    $i++;
}

?>
 </table>