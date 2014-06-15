<section class="guide_section3">

    <div class="row">
    <div class="main-content span_4_of_6">
        <?php
        if (isset($this->module)) {
 if (isset($this->data)) {
            Modules::run($this->module, $this->file, $this->data);
        } else {

            Modules::run($this->module, $this->file);
        }
        }
        ?>
    </div>    
    <?php 
        if(isset($this->moduleNav)){
            ?>
    
        <div class='section_nav3 span_1_of_6_omega'>
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
    </div>
</section>