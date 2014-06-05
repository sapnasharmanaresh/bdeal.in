<div class="alignright">
    <img src="<?php echo PROFILE_IMAGE; ?><?php echo $this->res[0]['image'] ?>" height='100px' width='100px'>
    <p><a href="" onclick="changePhoto();
            return false;">Change Photo</a></p>
</div>
<table>
    <tr>
        <td>You are </td>
        <td><?php
            /*
             * name
             */
//print_r($this->res);
            ?></td>
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>

    </tr>
</table>

<!--username
Address
contact
password
change password -->
<div id="updatePhoto" class="show_none">
    <form name="update-profile" action="<?php echo BASEURL ?>admin/profile" enctype="multipart/form-data" method='post'>
        <input type="file" name="file">
        <input type="submit" name="upload" value='Upload'>
    </form>
</div>
<a href='' onclick='showPasswordPanel();return false;'>Change Password</a>
<div class='show_none' id='passwordPanel'>
    <form name='changePassword' action='<?php echo BASEURL ?>admin/profile' method='post'>
        <input type='password' name='prevPass' placeholder='Previous Password'>
        <input type='password' name='newPass' placeholder='New Password'>
        <input type='password' name='confirmPass' placeholder='Confirm Password'>
        <input type='submit' value='Commit Changes' name='changePassword'>
    </form>
</div>
