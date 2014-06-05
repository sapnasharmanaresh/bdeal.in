<form name="send-mail" action="" method="post">
    To:<select name="" onchange="mail_selection(this.value)">
        <option selected disabled>--select--</option>
        <option>All</option>
        <option>Employee</option>
        <option>Customer</option>
        <option>Owner</option>
    </select>
    
    
Subject<input type="text" name="subject">
Message<input type="text" name="message">
<input type="submit" value="Save" name="save_mail">
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