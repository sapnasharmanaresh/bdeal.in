<form name="set-mail" action="<?php echo BASEURL .Session::get('role') ?>/email" method="post">
    Reference Name<input type="text" name="ref_name">
    Subject<input type="text" name="subject">
    Message<input type="text" name="message">
    <input type="submit" value="Save" name="save_mail">
</form>