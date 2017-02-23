

<form id="form1" name="form1" method="post" action="">
  <table border="0" cellpadding="3" cellspacing="0">
    <tr>
      <td align="right">Tên nhóm</td>
      <td><input name="title" type="text" class="input_text" id="title" value="{$row.title}" /></td>
    </tr>
    <tr>
      <td align="right">Ghi chú</td>
      <td><textarea name="description" class="input_text" id="description">{$row.description}</textarea> </td>
    </tr>
    <tr>
		<td align="right" valign="top"><b>Nhóm mặc định</b></td>
		<td valign="top" align="left">	<input name="is_registered" type="checkbox" value="1" {if $row.is_registered ==1} checked="checked" {/if}/></td>
	</tr>
    <tr>
      <td align="right">Quyền được truy cập</td>
      <td>
      		<div id="div_permission" style="max-height: 300px; width:200px; overflow: auto; border: 1px solid gray; padding: 10px;">
      		{html_checkboxes name='permission' options=$permission selected=$user_permission  separator='<br />'}
      		</div>
            <label><input type="checkbox" onchange="$('#div_permission').find(':checkbox').attr('checked', this.checked);" /> Chọn/ Bỏ chọn tất cả</label>
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Đồng ý" />
      <input type="button" name="Submit2" value="Quay lại" onclick="window.location.href = '{$smarty.cookies.re_dir}'"/></td>
    </tr>
  </table>
</form>