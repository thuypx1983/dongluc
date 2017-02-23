
<form id="form_pass" name="form1" method="post" action="" enctype="multipart/form-data">
  <table width="100%" border="0" cellspacing="0" cellpadding="3">
  	{if $msg!=""}
    <tr>
      <td class="col_left">&nbsp;</td>
      <td class="col_right"><div style="color: red;">{$msg}</div></td>
    </tr>
    {/if}
    <tr>
      <td class="col_left" width="15%">&nbsp;</td>
      <td class="col_right" width="85%"><input type="submit" name="Submit3" value="{#button_submit#}" />
        <input type="button" name="Submit3" value="{#button_back#}"onclick="location.href='{$smarty.session.grid_url}'"/></td>
    </tr>
    <tr>
      <td class="col_left">Mật khẩu cũ</td>
      <td class="col_right"><input name="old_password" type="password" /></td>
    </tr>
    <tr>
      <td class="col_left">Mật khẩu mới</td>
      <td class="col_right"><input name="new_password" type="password" /></td>
    </tr>
    <tr>
      <td class="col_left">Nhập lại mật khảu mới</td>
      <td class="col_right"><input name="re_new_password" type="password" /></td>
    </tr>
    <tr>
      <td class="col_left">&nbsp;</td>
      <td class="col_right"><font class="error_pass" color="red"></font></td>
    </tr>
    <tr>
      <td class="col_left">Tên đầy đủ</td>
      <td class="col_right"><input name="fullname" type="text" value="{$row.fullname}" /></td>
    </tr>
    <tr>
      <td class="col_left">Email</td>
      <td class="col_right"><input name="email" type="text" value="{$row.email}" /></td>
    </tr>
    <tr>
      <td class="col_left">Số điện thoại</td>
      <td class="col_right"><input name="phone" type="text" value="{$row.phone}" /></td>
    </tr>
    <tr>
      <td class="col_left">&nbsp;</td>
      <td class="col_right"><input type="submit" name="Submit3" value="{#button_submit#}" />
        <input type="button" name="Submit3" value="{#button_back#}" onclick="location.href='{$smarty.session.grid_url}'"/></td>
    </tr>
  </table>

</form>

<script type="text/javascript">
	$(function(){
		
		$('input[name="old_password"]').val("");
		
		$('form#form_pass').submit(function(){
			
			var old_password = $('input[name="old_password"]').val();
			var new_password = $('input[name="new_password"]').val();
			var re_new_password = $('input[name="re_new_password"]').val();
			
			$('font.error_pass').text(""); 
			
			if(old_password.length==0)
			{
				$('font.error_pass').text("Bạn chưa nhập mật khẩu cũ");
				return false;
			}
			if(new_password.length==0)
			{
				$('font.error_pass').text("Bạn chưa nhập mật khẩu mới");
				return false; 
			}
			else if(new_password!=re_new_password)
			{
				$('font.error_pass').text("Xác nhận mật khẩu không đúng"); 
				return false;
			}
			else
				return true;
		});

	});


</script>