<select onchange ="category();" id="cat" name="cat">
    <option value="select" selected disabled>--select--</option>
    <?php
    foreach($this->catList as $k => $value){
        ?>
    <option value="<?php echo $value['category_id']; ?>"><?php echo $value['category_name'] ;?></option>
 <?php
    }
    ?>
</select>