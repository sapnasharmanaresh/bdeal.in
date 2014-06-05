

<option selected disabled>--select--</option>
    <?php
    foreach($this->res as $key=>$value){
        echo "<option>".$value['name']."</option>";
    }
    ?>


