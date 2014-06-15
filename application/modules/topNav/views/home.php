Shop Navigation can get 7 items and their submenus can be added
<form name='shopMenus' action='<?php echo BASEURL; ?>admin/manageWelcomeNav' method='post'>
    <div class='right'>
    <input type='submit' class='btn btn-color3' name='saveWelcomeMenus' value='Save'>    
    </div>
    <table class='table'>
    
    <?php
    $pos = array();
    
    foreach($this->res as $key=>$value){
     $menu_pos[$key] = $value['position'];   
    $pos[$key] = $value['name'];
    }
    for ($i = 0; $i <= 6; $i++) {
            ?>
            <tr>
                <td>Menu <?php echo $i; ?></td>
                <td><input type='text' name='menu<?php echo $i ?>' value='<?php  if(isset($pos[$i]))echo $pos[$i]; else ''?>'> 
                  
                    <button  onclick='deleteMenu(<?php echo $menu_pos[$i]; ?>);return false;'>-delete Menu</button>
                </td>
            </tr>
            <?php
        }
    
        ?>

    </table>
</form>

