<div class="col span_4_of_6 ">
    <div class="form-search search">
   <form name="search" id="search" action="<?php echo BASEURL."search/search" ?>" method='get'>
        <input type="text" name="q" placeholder="Search" value="<?php if(isset($_GET['q']))echo $_GET['q']; ?>" onkeyup='search(this.value);'>
        <span class="icon">
            <input type='submit' name='btn' class="show_none" > <a href="" onclick="submitSearch();"><img src="<?php echo ICONS ?>search.png" height="4%" width="5%"/></a>
        </span>
   </form>
    </div>
</div>
