Shop Navigation can get 7 items and their submenus can be added
<form name='shopMenus' action='<?php echo BASEURL; ?>owner/shopNav' method='post'>
    <div class='right'>
    <input type='submit' class='btn btn-color3' name='saveShopMenus' value='Save'>    
    </div>
    <table class='table'>
    
    <?php
    //print_r($this->res);
    foreach($this->res as $key=>$value){
     $menu_pos[$key] = $value['menu_pos'];   
    $pos[$key] = $value['menu_name'];
    
    }
    for ($i = 0; $i <= 6; $i++) {
            ?>
            <tr>
                <td>Menu <?php echo $i; ?></td>
                <td><input type='text' name='menu<?php echo $i ?>' value='<?php  if($pos[$i])echo $pos[$i]; else NULL; ?>'> 
                  
                    <button  onclick='deleteMenu(<?php echo $menu_pos[$i]; ?>);return false;'>-delete Menu</button>
                </td>
            </tr>
            <?php
        }
    
        ?>

    </table>
</form>
<?php
if (isset($_GET['id'])) {
    $menu_id = $_GET['id'];
}
?>
