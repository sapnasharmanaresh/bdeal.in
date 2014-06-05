<?php   
if (isset($this->res)) {
  ?>
<table class="table">
    <tr>

        <th>
            Request_id
        </th>
        <th>
            Username
        </th>
        <th>
            Shop name
        </th>
        <th>
            Shop Description
        </th>

        <th>
            Date of Request
        </th>
        <th>
            Product_list
        </th>
        <th>
            Quality Report
        </th>
    </tr>
    <?php
  
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
                    <?php echo $res[$i]['timestamp']; ?>
                </td>

                <td>
                    <a href="<?php echo "../".PRODUCT_XLS.$res[$i]['product_file']; ?>">list</a>
                </td>
                <td>
                    <?php if($res[$i]['replyfromqualitydpt'] == 'Approved'){echo "Approved";}else{?>
                        <select onchange="status(<?php echo $res[$i]['id']; ?>,$(this).val())">
                            <option  disabled>--select--</option>
                            <option <?php if($res[$i]['replyfromqualitydpt'] == 'Pending')echo "Selected";?>>Pending</option>
                            <option <?php if($res[$i]['replyfromqualitydpt'] == 'Approved')echo "Selected";?>>Approved</option>
                            <option <?php if($res[$i]['replyfromqualitydpt'] == 'Rejected')echo "Selected";?>>Rejected</option>
                        </select>
                    <?php }?>
                </td>



            </tr>
        <?php
        }
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

</table>

