<p><a href="#admin">Request to mall-Admin</a></p>
<p><a href="#owner">Request to other owner</a></p>
<div id="admin" class="noDisplay">
<form name="advertisement-requestToAdmin" action="<?php echo BASEURL;?>owner/advertisement" method="post" enctype="multipart/form-data">
Upload Image file for advertisement on main page( to mall-admin)
<input type="file" name="adverToAdmin"/>
<input type="submit" value="Send Request" name="sendToAdmin">
</form>
</div>
<div id="owner" class="noDisplay">
<form name="advertisement-requestToOwner" action="<?php echo BASEURL;?>owner/advertisement" method="post" enctype="multipart/form-data">
Upload Image file for advertisement on shop page( to shop owner)
<input type="text" name="name" placeholder="Owner Name">
<input type="file" name="adverToOwner"/>
<input type="submit" value="Send Request" name="sendToOwner">
</form>
</div>
<a href="#track">Track request</a>
<div id="track">
    <?php /**
     *  status of request
     */
    ?>
</div>