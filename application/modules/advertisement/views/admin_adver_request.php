<table class="table">
    <tr>
        <th>Sr no</th>
        <th>Owner_name</th>
        <th>Shop Name</th>
        <th>Date of Request</th>
        <th>Image</th>
        <th>Status</th>
        <th>Allot Date</th>
        <th>for Days</th>
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
            <td><?php echo $value['status'];?></td>
             <td><input type="text" class="datepicker"></td>
              <td><input type="text" name="days" value="<?php if(!empty($value['']))echo $value[''];?>"</td>
              <td><input   type='submit' class='btn' value='Allot' name='allotDates'></td>
    </tr>
    
    <?php
    $i++;
    }
    ?>
</table>
<script>
    $('.datepicker').focus(function(){
      //  alert(1);
        $(this).datepicker();
    })
    </script>