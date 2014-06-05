<div class='user-info left'>
    <?php foreach ($this->res as $key => $value) { ?>


        <span class='left'> 
            <a href='<?php echo BASEURL . 'template/' . Session::get('role') ?>'>
                <img src="<?php echo BASEURL.PROFILE_IMAGE.$value['image'] ?>" height='30px' width='40px'>
            </a>
        </span>
        <span class='left user__name__hover'>
            <a  href='<?php echo BASEURL . 'template/' . Session::get('role') ?>'>Hi,<?php echo $value['username']; ?></a>

            <span class='user-intro'>
                <a href="<?php echo BASEURL.Session::get('role') ?>/profile">Profile</a>
                <a id="logout" href="<?php echo BASEURL.Session::get('role') ?>/logout">Logout</a>
            </span>
        </span>
    <?php } ?>
</div>

