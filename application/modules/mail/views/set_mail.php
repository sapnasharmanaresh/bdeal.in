<form name="set-mail" action="<?php echo BASEURL .Session::get('role') ?>/createMail" method="post">
    <table class=table>
    <tr>
		<td>Reference Name</td>
		<td><input type="text" name="ref_name"></td>
    </tr>
    <tr>
		<td> Subject</td>
		<td>  <input type="text" name="subject"></td>
    </tr>
    <tr>
		<td>Message</td>
		<td><textarea name="message" rows='15' cols='30'></textarea></td>
    </tr>
    <tr>
		<td colspan=2>    <input class=btn-color3 type="submit" value="Save" name="save_mail"></td>
    </tr>
    </table>
 
 

</form>
