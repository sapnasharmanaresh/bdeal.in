<div class=''>
     <table class="table">
         <tr>
             <th>No</th>
             <th>Date</th>
             <th>Notification</th>
         </tr>
    <?php
    $num = 1;
    foreach($this->notifications as $k=>$notification){
        
    ?>
   
        <tr>
            <td><?php echo $num?></td>
            <td><?php echo $notification['timestamp']; ?> </td>
            <td><?php echo $notification['notification'] ?></td>
        </tr>
        

    <?php
    $num ++;
    }
    ?>
            </table>
</div>