
<div class="nav-link right l-link">
    <a class="search" href="" ></a>
    <a class='link left link-color link-background-1 link-padding' href='<?php echo BASEURL; ?>user/login'>My account</a>
    <a class='link left link-color  link-padding' href='<?php echo BASEURL; ?>ownerRequest/form'>Be an Owner</a>
</div>
<nav>
    <ul class="nav">
        <?php
        Modules::run('topNav', 'display');
        ?>
    </ul>       </nav>
</header>


