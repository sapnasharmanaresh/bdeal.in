<section class="guide_section3">
    <div class="main-content">
        <?php
        if (isset($this->module)) {
 if (isset($this->data)) {
            Modules::run($this->module, $this->file, $this->data);
        } else {

            Modules::run($this->module, $this->file);
        }
        }
        ?>
        <?php 
        if(isset($this->moduleNav)){
            ?>
    
        <div class='section_nav3'>
            <?php
            if (isset($this->dataNav)) {

                Modules::run($this->moduleNav, $this->fileNav, $this->dataNav);
            } else {

                Modules::run($this->moduleNav, $this->fileNav);
            }
            ?>
        </div>
            <?php
        }
        ?>

</section>