
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
      <td class="col_left">Code</td>
      <td class="col_right"><input name="name" type="text"  id="name" value="{$row.name}" /></td>
    </tr>
    <tr>
      <td class="col_left">Giá trị</td>
      <td class="col_right">{"value"|ckeditor:$row.value}</td>
    </tr>
	<!--<tr>
      <td class="col_left">Giá trị 2</td>
      <td class="col_right"><input name="value2" type="text"  id="value2" value="{$row.value2}" /></td>
    </tr>
	<tr>
      <td class="col_left">Giá trị 3</td>
      <td class="col_right"><input name="value3" type="text"  id="value3" value="{$row.value3}" /></td>
    </tr>-->
    <tr>
      <td class="col_left">&nbsp;</td>
      <td class="col_right"><input type="submit" name="Submit3" value="{#button_submit#}" />
        <input type="button" name="Submit3" value="{#button_back#}" onclick="location.href='{$smarty.session.grid_url}'"/></td>
    </tr>
  </table>

</form>