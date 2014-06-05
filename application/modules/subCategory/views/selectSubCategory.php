
    <option value="select" selected disabled>--select--</option>
    <?php
    foreach($this->subCatList as $k => $value){
        ?>
    <option value="<?php echo $value['id']; ?>"><?php echo $value['subcategory'] ;?></option>
 <?php
    }
    ?>
