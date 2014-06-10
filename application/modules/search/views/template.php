
<section class="sec3 row wrapper">
 <?php 
 if(isset($this->moduleSideBar)){
     ?>
 
    <div class='sidebar span_1_of_6'>
        <?php
    if(isset($this->dataSideBar)){
     
           Modules::run($this->moduleSideBar,$this->fileSideBar,$this->dataSideBar);
    }
    else{
        
         Modules::run($this->moduleSideBar,$this->fileSideBar);
    }
           ?> 
    </div>
       <?php
       ?>
     <div class="main-content span_4_of_6">
    <?php
 }
 else{
 ?>
         <div class='main-contentWithMargin'>    
             <?php
 }
 ?>
   
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