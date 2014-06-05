<table class="table">
    <tr>
        <th>Sr.</th>
        <th>Purpose</th>
        <th>Recieved From</th>
        <th>Amount Recieved</th>
        <th>Date</th>
    </tr>
   <?php  foreach($this->detail as $key=>$detail){ ?>
    <tr>
        <td><?php echo $detail['id']; ?></td>
        <td><?php echo $detail['purpose']; ?></td>
        <td><?php echo 'Owner : '.$detail['username']."<br/>Shop #".$detail['shop_id'].$detail['shop_name']."<br/>Email:".$detail['email']; ?></td>
        <td><?php echo $detail['amount']; ?></td>
        <td><?php echo $detail['date']; ?></td>
    </tr>
    <?php
   }
   ?>
</table>