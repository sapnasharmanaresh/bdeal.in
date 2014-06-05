



<?php   
if (isset($this->res)) {
  ?>


<table class="table">
    <tr>
        <th>Sr no</th>
        <th>Owner_name</th>
        <th>Shop Name</th>
        <th>Date of Request</th>
        <th>Image</th>
        <th>Status</th>
      </tr>
    
    <?php
    $i= 1;
    foreach($this->res as $key=>$value){
    ?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $value['username'];?></td>
         <td><?php echo $value['shop_name'];?></td>
          <td><?php echo $value['dateOfRequest'];?></td>
          <td><a class='fancybox' href="<?php echo ADVERTISEMENT . $value['to_user_id'] . "/" . $value['from_user_id'] . "/".$value['image'] ?>">see</a></td>
          
            <td>
                    <?php if($value['quality_dept_report'] == 'Approved'){echo "Approved";}else{?>
                        <select onchange="adverStatus(<?php echo $value['id']; ?>,$(this).val())">
                            <option  disabled>--select--</option>
                            <option <?php if($value['quality_dept_report'] == 'Pending')echo "Selected";?>>Pending</option>
                            <option <?php if($value['quality_dept_report'] == 'Approved')echo "Selected";?>>Approved</option>
                            <option>Rejected</option>
                        </select>
                    <?php }?>
                </td>
             
    </tr>
    
    <?php
    $i++;
    }
    ?>
</table>
<?php
}
else{
  ?>
            <table class="table">
               <tr> <th>
               No Pending Request
                </th></tr>
            </table>        
    
<?php
    }


    ?>