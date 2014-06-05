Shop Navigation can get 7 items and their submenus can be added
<form name='shopMenus' action='<?php echo BASEURL; ?>owner/shopNav' method='post'>
    <div class='right'>
    <input type='submit' class='btn btn-color3' name='saveShopMenus' value='Save'>    
    </div>
    <table class='table'>
    
    <?php
    //print_r($this->res);
    foreach($this->res as $key=>$value){
        
    
    }
    for ($i = 1; $i <= 7; $i++) {
            ?>
            <tr>
                <td>Menu <?php echo $i; ?></td>
                <td><input type='text' name='menu<?php echo $i ?>' value='<?php   if($value['menu_pos']==$i)echo $value['menu_name']; ?>'> 
                    <button onclick='submenus(<?php echo $i ?>);return false;'>+check Submenus</button>
                      <button onclick='addSubmenu(<?php echo $i ?>);return false;'>+add Submenu</button>
                    <button  onclick='deleteMenu(<?php echo $i ?>);return false;'>-delete Menu</button>
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
