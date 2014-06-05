<?php

/*
 * List of all the employees of specific owner
 */
?>


<?php

if (isset($GET['id'])) {
$detail_id = $_GET['id'];
    foreach($this->emp as $key=>$value){
    ?>
    <div id="emp-detail">
        <div id="image">
            <img src="<?php IMAGE . $value['image'] ?>">
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
            </select>
            Account status<select>
                <option <?php if($value['status']=='Enable') echo"selected";?>>Enable</option>
                <option <?php if($value['status']=='Disable') echo"selected";?>>Disable</option>
                <option>Delete</option>
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
    
    Search<input type="text" name="search-table"> 
  List of all the employees
<table>
    <tr>
        <th>Sr no</th>
        <th>Emp_name</th>
        <th>Emp_department</th>
       
        <th></th>

    </tr>
    <?php
    $i = 1;
    foreach ($this->emp as $key => $value) {
        if ($value['role'] == 'owner_act') {
            $role = 'Accounts';
        }
        if ($value['role'] == 'owner_sales') {
            $role = "Sales";
        }
        if ( $value['role'] == 'owner_purchase') {
            $role = 'Purchase';
        }
    
        ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $value['username']; ?></td>
            <td><?php echo $role; ?></td>
         
            <td><a href="?id=<?php echo $value['id']; ?>">More Details</a></td>

        </tr>
    </table>

    <?php
    $i++;
}


?>

