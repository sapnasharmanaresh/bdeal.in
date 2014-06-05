
<!--
<input type='button' name='chatStart' value='Start chat'>



<div class=''>
    <
</div>
-->

<div id="div_chat" style="height: 300px; width: 500px; overflow: auto; background-color: #CCCCCC; border: 1px solid #555555;">

</div>
<form id="frmmain" name="frmmain" onSubmit="return blockSubmit();" method='post'>
    Enter bdeal Username to start chattind<input type='text' name='chat_name'>
    <input type="button" name="btn_get_chat" id="btn_get_chat" value="Refresh Chat" onClick="javascript:getChatText();" />
    <input type="button" name="btn_reset_chat" id="btn_reset_chat" value="Reset Chat" onClick="javascript:resetChat();" /><br />
    <input type="text" id="txt_message" name="txt_message" style="width: 447px;" />
    <input type="button" name="btn_send_chat" id="btn_send_chat" value="Send" onClick="javascript:sendChatText();" />
</form>