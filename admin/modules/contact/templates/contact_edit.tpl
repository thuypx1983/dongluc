
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
  <table border="0" cellpadding="3" cellspacing="0">
  {if $msg}
  	<tr>
      <td align="right"></td>
      <td style="color: #F00;">{$msg}</td>
    </tr>
  {/if}
	<tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Submit" />
      <input type="button" name="Submit2" value="{#button_back#}" onclick="location.href='{$smarty.session.grid_url}'"/></td>
    </tr>
	<tr>
      <td align="right">Thư liên hệ sẽ được gửi tới email:</td>
      <td><input name="email_contact" type="text" value="{$row.email_contact}" size="80" /></td>
    </tr>
	{*<tr>
      <td align="right">Tiêu đề</td>
      <td><input name="title" type="text" value="{$row.title}" size="80" /></td>
    </tr>
    *}
	{*
    <tr>
      <td align="right">Thông tin liên hệ</td>
      <td>{"info"|ckeditor:$row.info}</td>
    </tr>
    <tr>
      <td align="right">Hỏi chuyên gia</td>
      <td>{"support"|ckeditor:$row.support}</td>
    </tr>
    *}	
	{*
    <tr>
      <td align="right">Bản đồ</td>
      <td>{"map"|ckeditor:$row.map}</td>
    </tr>
    *}
	
	<tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Submit" />
      <input type="button" name="Submit2" value="{#button_back#}" onclick="location.href='{$smarty.session.grid_url}'"/></td>
    </tr>
	
  </table>
</form>