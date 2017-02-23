
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
  <table width="100%" border="0" cellspacing="0" cellpadding="3">
    <tr>
      <td width="15%" class="col_left">&nbsp;</td>
      <td width="85%" class="col_right"><div style="color: red;">{$msg}</div></td>
    </tr>
    <tr>
      <td class="col_left">&nbsp;</td>
      <td class="col_right"><input type="submit" name="Submit3" value="{#button_submit#}" />
        <input type="button" name="Submit3" value="{#button_back#}"onclick="location.href='{$smarty.session.grid_url}'"/></td>
    </tr>
    <tr>
      <td class="col_left">Loại người dùng</td>
      <td class="col_right"><select name="user_type_id" id="user_type_id">
<option value=''>---</option>
		{html_options  options=$user_type selected=$row.user_type_id|default:$smarty.session.user_type_id}
                
                
</select></td>
    </tr>
    <tr>
<td class="col_left">Username</td>
<td class="col_right"><input size="50" maxlength="255" name="username" type="text" value="{$row.username}" /></td>
</tr>
    <tr>
<td class="col_left">Email</td>
<td class="col_right"><input size="50" maxlength="255" name="email" type="text" value="{$row.email}" /></td>
</tr>
<tr>
<td class="col_left">Mật khẩu</td>
<td class="col_right"><input size="50" maxlength="255" name="password" type="password" /></td>
</tr>
<tr>
<td class="col_left">Ngày tạo</td>
<td class="col_right"><input size="50" maxlength="255" name="create_date" type="text" value="{$row.create_date|default:$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'}" readonly="readonly" /></td>
</tr>
<tr>
<td class="col_left"><b>Kích hoạt</b></td>
<td class="col_right"><input name="is_active" type="checkbox" value="1" {if $row.is_active ==1} checked="checked" {/if}/></td>
</tr>
<tr>
<td class="col_left">Tên đầy đủ</td>
<td class="col_right"><input name="fullname" type="text" id="fullname" value="{$row.fullname}" size="50" maxlength="255" /></td>
</tr>
<tr>
<td class="col_left">Địa chỉ</td>
<td class="col_right"><input size="50" maxlength="255" name="address" value="{$row.address}" type="text" /></td>
</tr>
<tr>
<td class="col_left">Điện thoại</td>
<td class="col_right"><input name="phone" type="text" value="{$row.phone}" size="50" maxlength="255" /></td>
</tr>
<tr>
  <td class="col_left">&nbsp;</td>
  <td class="col_right"><input type="submit" name="Submit3" value="{#button_submit#}" />
    <input type="button" name="Submit3" value="{#button_back#}" onclick="location.href='{$smarty.session.grid_url}'"/></td>
</tr>
  </table>

  
</form>