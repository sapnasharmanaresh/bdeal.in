<?php
if (Session::get('role') == 'admin') {
     ?>
    <table class='table'>
        <tr>
             <th>Sr no.</th>
            <th>Sender Mail</th>
            <th>Complaint no</th>
            <th>Complaint type</th>
            <th>Complaint</th>
        </tr>
        <?php 
        $i = 1;
        foreach($this->to_admin as $key=>$value){
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $value['email']; ?></td>
                <td><?php echo $value['complaint_no'] ?></td>
                <td><?php echo $value['complaint type']; ?></td>
                <td><?php echo $value['complaint']; ?></td>
            </tr>
        <?php
        $i++;    
        
        }
    
} else if (Session::get('role') == 'customer') {
    ?>
  
    <form name="complaint">
        <input type="email" value="<?php Session::get('email') ?>" >
        Select Shop Name<select name="shop"><?php /**
         *  list of all the shops of mall add none also
         */
        ?>
            ?></select>
        Complaint_type<input type="radio" name="type">Service
                                 <input type="radio"name="type">Product
                                 <input type="radio"name="type">Delivery
                                 <input type="radio" name="type">Web Portal
  Write Message<input type="text"name="complaint">
         <input type="submit" name="Send">
    </form>
    <?php
} else if (Session::get('role') == 'owner') {
    ?>
    <table class="table">
        <tr>
        <th>Sr no.</th>
            <th>Sender Mail</th>
            <th>Complaint no</th>
            <th>Complaint type</th>
            <th>Complaint</th>
        </tr>
        <?php 
        $i = 1;
        foreach($this->to_owner as $key=>$value){
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $value['email']; ?></td>
                <td><?php echo $value['complaint_no'] ?></td>
                <td><?php echo $value['complaint type']; ?></td>
                <td><?php echo $value['complaint']; ?></td>
            </tr>
        <?php
        $i++;    
        
        }
        ?>
    </table>
    <?php
} 
?>
