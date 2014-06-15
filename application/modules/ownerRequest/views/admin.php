
<table class="table">
    <tr>
        
        <th>
            Request_id
        </th>
        <th>
            Name
        </th>
        <th>
            Shop name
        </th>
        <th>
            Shop Description
        </th>
        <th>
            Contact no
        </th>
        <th>
            Deal %age
        </th>
        <th>
            Date of Request
        </th>
        <th>
            Status
        </th>
        <th>
            Quality Report
        </th>
    </tr>
    <?php
    if (isset($this->res)) {
        //print_r($this->res);
        $res = $this->res;
        $iterator = new ArrayIterator($res);
        $c = $iterator->count();

        for ($i = 0; $i < $c; $i++) {
            ?>
            <tr>
                
                <td>
                    <?php echo 'ore_' . $res[$i]['id']; ?>
                </td>
                <td>
                    <?php echo $res[$i]['ownerName']; ?>
                </td>
                <td>
                    <?php echo $res[$i]['shopName']; ?>
                </td>
                <td>
                    <?php echo $res[$i]['shopDescription']; ?>
                </td>
                <td>
                    <?php echo $res[$i]['contact']; ?>
                </td>
                <td>
                    <?php echo $res[$i]['profitdeal']; ?>
                </td>
                <td>
                    <?php echo $res[$i]['timestamp']; ?>
                </td>
               
                <td>
                  <?php if($res[$i]['status'] == 'Approved'){echo "Approved";}else{?>
                    <select onchange="status(<?php echo $res[$i]['id']; ?>,$(this).val())">
                        <option  disabled>--select--</option>
                        <option <?php if($res[$i]['status'] == 'Pending')echo "Selected";?>>Pending</option>
                        <option <?php if($res[$i]['status'] == 'Approved')echo "Selected";?>>Approved</option>
                        <option <?php if($res[$i]['status'] == 'Rejected')echo "Selected";?>>Rejected</option>
                    </select>
                    <?php }?>
                </td>
                <td>
                    <?php  echo $res[$i]['replyfromqualitydpt'];
                     ?>
                </td>
                <?php
                    if($res[$i]['replyfromqualitydpt'] == 'Approved' and $res[$i]['status'] == 'Approved')
                    {   ?>
            <td class="no-border">
                             
            <a id='assign' onclick="assign(<?php echo $res[$i]['id']; ?>)">Assign Login Credentials</a>  
                   </td>
                             <?php }
                 ?>
                
            </tr>
            <?php
        }
    }
   
    
    
    ?>
    
</table>

* The requests which are approved are sent to quality department<br/>
* Wait for approval of quality department
