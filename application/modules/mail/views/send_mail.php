
<form name="send-mail" action="<?php echo BASEURL?>admin_sales/sendMail" method="post">
   <table class='table mail'>
	<tr>
		<td>  To:</td>
		<td><select name="scope" onchange="mail_selection(this.value)">
				<option selected disabled>--select--</option>
				<option value='All'>All</option>
				<option value='Employee'>Employee</option>
				<option value='Customer'>Customer</option>
				<option value='Owner'>Owner</option>
				<option value='Manually'> Enter Manually</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>Template</td>
		<td><select><option></option></select></td>
	</tr>
		<tr>
			<td colspan=2>Or</td>
		</tr>
	<tr>
		<td>Subject</td>
		<td><input type="text" name="subject"></td>
	</tr>	
	<tr>
		<td>Message</td>
		<td><textarea name="message" rows='15' cols='30'></textarea></td>
	</tr>
	<tr>
		<td colspan=2>
<input type="submit" value="Send" name="send_mail"></td>
	</tr>
   </table>
 </form>

<div id="employee" class="show_none">
    <select>
        <option>All</option>
        <option>Department</option>
        <option>Enter Manually</option>
    </select>
</div>

<div id="customer" class="show_none">
    <select>
        <option>All</option>
        <option>Enter Manually</option>
    </select>
</div>
