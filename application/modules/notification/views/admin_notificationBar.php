
<div class='notification'>
    
<?php  
foreach($this->notif as $key=>$value){
           echo "<div class='notif-block'>".$value['notification']."</div>";
       }
       
       ?>
        <a class='right' href='<?php echo BASEURL ?>admin/notification'>see all -></a>
    
</div>