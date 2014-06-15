<?php
/**
 * currently which items are in list of shipping
 */
?>
<?php
if(isset($this->detail)){
   // print_r($this->detail);
foreach($this->detail as $k=>$v)
{   
    ?>
   <div id="detail-box">
        <div class="image span_2_of_6">
            <img src="<?php echo BASEURL. PROFILE_IMAGE . $v['image'] ?>">
  </div>
        <div class="info span_4_of_6">
            <p>Firstname:<?php echo $v['firstname'] ?></p>
            <p>Lastname:<?php echo $v['lastname'] ?></p>
            <p>Gender<?php echo $v['gender'] ?></p>
            <p>Email id:<?php echo $v['email'] ?></p>
            <p>Address::<?php echo $v['address'] ?></p>
            <p>City:<?php echo $v['city'] ?></p>
            <p>Pincode:<?php echo $v['pincode'] ?></p>
            <p>Country:<?php echo $v['country'] ?></p>

            <p>Contact:<?php echo  $v['contact'] ?> </p>

            <a href="#mail">Send Mail</a>
            <select>
                <option>Warning</option>
                <option>Compose </option>
            </select>
            
            <?php
            /**
            *
             * admin can send warning mail to that person if reported for any breach in policy
             */
?>
            Account status<select onchange='account_status(<?php $v['user_id']?>)'>
                <option <?php if($v['status']=='Enable') echo"selected";?>>Enable</option>
                <option <?php if($v['status']=='Disable') echo"selected";?>>Disable</option>
                <option>Delete</option>
                <?php
                /**
                 * If admin disables anyone's account then it would be sent to the email of that person
                 */
                ?>
            </select>
        </div>
    </div>
    <div id="mail"><?php Modules::run('mail', '') ?></div>
    <?php

}
}
?>
   <?php
   /**
    * Here need to put code so that it can search returned $res data  for the entered value 
    */
   ?>
    
    Search<input type="text" name="search-table" onkeyup='search_owner(this.value)'> 
    <div id='result'></div>
  List of all the Owners
<table class='table'>
    <tr>
        <th>Sr no</th>
        <th>Owner_name</th>
        <th>Shop_name</th>
        <th>Shop_details</th>
        <?php
        /**
         * Under shop details comes shop logo,description,product_list
         */
        ?>
        
        <th>Details</th>
    </tr>
    <?php
    $i = 1;
    foreach ($this->res as $key => $value) {
    
        ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $value['username']; ?></td>
            <td><?php echo $value['shop_name']; ?></td>
            <td><?php echo $value['description'];?></td>
            <td><a href="<?php echo BASEURL.'admin/owner' ?>/<?php echo $value['id']; ?>">More Details</a></td>

        </tr>
    

    <?php
    $i++;
}

?>
</table>
