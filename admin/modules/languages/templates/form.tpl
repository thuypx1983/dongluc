<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
  <table border="0" cellpadding="3" cellspacing="0">
  	{if $msg!=""}
	<tr>
      <td class="col_left">&nbsp;</td>
      <td class="col_right"><div style="color: red;">{$msg}</div></td>
    </tr>  
    {/if}
	<tr>
      <td class="col_left">&nbsp;</td>
      <td class="col_right"><input type="submit" name="Submit" value="Lưu thay đổi" />
      <input type="button" name="Submit2" value="Quay lại" onclick="location.href='{$smarty.session.grid_url}'"/></td>
    </tr>
	<tr>
      <td class="col_left">Mã</td>
      <td class="col_right"><input name="code" type="text" value="{$row.code}" /></td>
    </tr>
    
	<tr>
      <td class="col_left">Tiêu đề</td>
      <td class="col_right"><input name="title" type="text" class="input_text" id="tex_title" value="{$row.title}" /></td>
    </tr>
	<tr>
      <td align="right">Ảnh</td>
      <td class="col_right">
	  	<input name="photo" type="file" /><br />
	  	{if $row.photo!=""}
			<img src="{$url}upload/lang/flag/{$row.photo}" /> <br />
			<input type="checkbox" name="che_delphoto" /> Xóa ảnh ?
			<input type="hidden" name="hid_oldphoto" value="{$row.photo}" />
		{/if}	
	  </td>
    </tr>	
	<tr>
      <td class="col_left">Nội dung</td>
	   <td class="col_right"><textarea name="content" style="width:500px; height:400px">{$row.content}</textarea></td>
    </tr>
	 <tr>
      <td class="col_left"><strong>Mặc định ?</strong></td>
      <td class="col_right">
	  		<input name="is_default" type="checkbox" value="1" {if $row.is_default ==1} checked="checked" {/if}/></td>
    </tr>
	<tr>
      <td class="col_left"><strong>Kích hoạt ?</strong></td>
      <td class="col_right">	 
	  		<input name="is_active" type="checkbox" value="1" {if $row.is_active ==1} checked="checked" {/if}/></td>
    </tr>
	<tr>
      <td class="col_left">&nbsp;</td>
      <td class="col_right"><input type="submit" name="Submit" value="Lưu thay đổi" />
      <input type="button" name="Submit2" value="Quay lại" onclick="location.href='{$smarty.session.grid_url}'"/></td>
    </tr>

  </table>
</form>