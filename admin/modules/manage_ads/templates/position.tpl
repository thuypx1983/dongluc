
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
      <td class="col_right">
		<input name="code" type="text"  value="{$row.code}" /> <font color="red">(Must be unique)</font>
      	
      </td>
    </tr>
    <tr>
      <td class="col_left">Title</td>
      <td class="col_right"><input name="title" type="text" value="{$row.title}" /></td>
    </tr>
    <tr>
      <td class="col_left">Width</td>
      <td class="col_right"><input name="width" type="text" value="{$row.width}" /></td>
    </tr>
    <tr>
      <td class="col_left">Height</td>
      <td class="col_right"><input name="height" type="text" value="{$row.height}" /></td>
    </tr>
    <tr>
      <td class="col_left">&nbsp;</td>
      <td class="col_right"><input type="submit" name="Submit3" value="{#button_submit#}" />
        <input type="button" name="Submit3" value="{#button_back#}" onclick="location.href='{$smarty.session.grid_url}'"/></td>
    </tr>
  </table>

  
</form>