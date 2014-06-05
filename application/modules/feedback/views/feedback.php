<?php
if (Session::get('role') == 'admin') {
     ?>
    <table class='table'>
        <tr>
             <th>Sr no.</th>
            <th>Sender Mail</th>
            <th>How come to know</th>
            <th>Review</th>
        </tr>
        <?php 
        $i = 1;
        foreach($this->to_admin as $key=>$value){
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $value['email']; ?></td>
                <td><?php echo $value['How you come to know about us'] ?></td>
                <td><?php echo $value['review']; ?></td>
            </tr>
        <?php
        $i++;    
        
        }
    
} else if (Session::get('role') == 'customer') {
    ?>
   
    <form name="feedback">
        <input type="email" value="<?php Session::get('email') ?>" >
        <p> How you come to know about us?</p>
        <span><input type="radio" name="source">Internet</span>
        <span><input type="radio" name="sourcce">Advertisement</span>
        <span><input type="radio" name="source">Blogs</span>
        <span><input type="radio" name="source">Other</span>
        <span class="show_none"><input type="text" value="source"></span>
       <p> Write us a message:</p>
        <input type="text" name="feedback">
        <input type="submit" name="Send">
    </form>
    <?php
} else if (Session::get('role') == 'owner') {
    ?>
    <table class="table">
        <tr>
            <th>Sr no.</th>
            <th>Sender Mail</th>
            <th>How come to know</th>
            <th>Review</th>
        </tr>
        <?php 
        $i = 1;
        foreach($this->to_owner as $key=>$value){
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $value['email']; ?></td>
                <td><?php echo $value['How you come to know about us'] ?></td>
                <td><?php echo $value['review']; ?></td>
            </tr>
        <?php
        $i++;    
        
        }
        ?>
    </table>
    <?php
} 
?>
