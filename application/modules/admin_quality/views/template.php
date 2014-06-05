<section class="admin_section3">
    <div class="main-content">
    <?php
    if(isset($this->data)){
     
           Modules::run($this->module,$this->file,$this->data);
    }
    else{
        
        Modules::run($this->module,$this->file);
    }
           ?>
    </div>
</section>