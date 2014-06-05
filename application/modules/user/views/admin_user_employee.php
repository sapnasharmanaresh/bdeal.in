
<?php
if(isset($_GET['id'])){
$detail_id = $_GET['id'];

  foreach ($this->detail as $k => $v) {
      //print_r($this->detail);
        //echo PROFILE_IMAGE . $v['image'];
          
    ?>
    <div id="detail-box">
        <div class="image span_2_of_6">
            <img src="<?php echo PROFILE_IMAGE . $v['image'] ?>">
        </div>
        <div class="info span_4_of_6">
            <p>Firstname:<?php echo $v['firstname'] ?></p>
            <p>Lastname:<?php echo $v['lastname'] ?></p>
            <p>Gender<?php echo $v['gender'] ?></p>
            <p>Email id:<?php echo $v['email'] ?></p>
            <p>Address:<?php echo  $v['address'] ?></p>
            <p>City:<?phpecho $v['city'] ?></p>
            <p>Pincode:<?php echo $v['pincode'] ?></p>
            <p>Country:<?php echo $v['country'] ?></p>

            <p>Contact:<?php echo $v['contact'] ?> </p>

            <span><a href="#mail">Send Mail</a></span>
            <select onchange="mail_type(<?php echo $detail_id; ?>,this.value)">
                <option>Warning</option>
                <option>Compose </option>
            </select>
            Account status<select onchange="account_status(<?php echo $_GET['id']?>,this.value)">
                <option <?php if($v['status']=='Enable') echo"selected";?>>Enable</option>
                <option <?php if($v['status']=='Disable') echo"selected";?>>Disable</option>
                <option>Delete</option>
            </select>
        </div>
    </div>
    
    <?php
}
}

?>
   <?php
   /**
    * Here need to put code so that it can search returned $res data  for the entered value 
    */
   ?>
    
    Search<input type="text" id='search' onkeyup='search(this.value)' name="search-table"> 
    
    <div id='result' ></div>
  List of all the employees
<table class='table'>
    <tr>
        <th>Sr no</th>
        <th>Emp_name</th>
        <th>Emp_department</th>
        <th>Emp_head</th>
        <th></th>

    </tr>
    <?php
    $i = 1;
    foreach ($this->res as $key => $value) {
        if ($value['role'] == 'admin_act' || $value['role'] == 'owner_act') {
            $role = 'Accounts';
        }
        if ($value['role'] == 'admin_sales' || $value['role'] == 'owner_sales') {
            $role = "Sales";
        }
        if ($value['role'] == 'admin_purchase' || $value['role'] == 'owner_purchase') {
            $role = 'Purchase';
        }
        if ($value['role'] == 'admin_quality') {
            $role = 'Quality';
        }
        ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $value['username']; ?></td>
            <td><?php echo $role; ?></td>
            <td><?php echo $value['head']; ?></td>
            <td><a href="<?php echo BASEURL.'admin/employee' ?>?id=<?php echo $value['id']; ?>">More Details</a></td>

        </tr>
    

    <?php
    $i++;
}
?>
</table>

