
<p style="margin-top:10px;">Tin nhắn từ <span class="user_send green bold">{$row.username|default:"Hệ thống"}<input type="hidden" name="reply_to_user" value="{$row.from_user_id}" /></span></p>

<div class="subject blue bold" style="margin:10px 0 20px;">{$row.subject}</div>
<strong>Chi tiết tin nhắn</strong>
<div style="line-height:18px; margin-top:10px;">
    {$row.content}
</div>