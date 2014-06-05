<?php
if (Session::get('role') == 'admin') {
     ?>
    <table>
        <tr>
            <td>Sr no.</td>
            <td>Sender Mail</td>
            <td>Wish</td>
        </tr>
        <?php 
        $i = 1;
        foreach($this->to_admin as $key=>$value){
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $value['email']; ?></td>
                <td><?php echo $value['wish-message']; ?></td>
            </tr>
        <?php
        $i++;    
        
        }
    
} else if (Session::get('role') == 'customer') {
    ?>
    If you want to see any item in the mall in future
    Kindly mail us
    <form name="wish-mail" >
        <input type="email" value="<?php Session::get('email') ?>" >
        <input type="text" name="items">
        <input type="submit" name="Send">
    </form>
    <?php
} else if (Session::get('role') == 'owner') {
    ?>
    <table>
        <tr>
            <td>Sr no.</td>
            <td>Sender Mail</td>
            <td>Wish</td>
        </tr>
        <?php 
        $i = 1;
        foreach($this->to_owner as $key=>$value){
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $value['email']; ?></td>
                <td><?php echo $value['wish-message']; ?></td>
            </tr>
        <?php
        $i++;    
        
        }
        ?>
    </table>
    <?php
} 
?>
