<?php /* Smarty version Smarty-3.1.7, created on 2015-05-12 10:14:48
         compiled from "admin/modules/manage_user/templates/edit_profile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:178971692555517028914a39-29194244%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '88685b063611058e0897518644524a51a403e48d' => 
    array (
      0 => 'admin/modules/manage_user/templates/edit_profile.tpl',
      1 => 1349602676,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '178971692555517028914a39-29194244',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'msg' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5551702896c45',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5551702896c45')) {function content_5551702896c45($_smarty_tpl) {?>
<form id="form_pass" name="form1" method="post" action="" enctype="multipart/form-data">
  <table width="100%" border="0" cellspacing="0" cellpadding="3">
  	<?php if ($_smarty_tpl->tpl_vars['msg']->value!=''){?>
    <tr>
      <td class="col_left">&nbsp;</td>
      <td class="col_right"><div style="color: red;"><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</div></td>
    </tr>
    <?php }?>
    <tr>
      <td class="col_left" width="15%">&nbsp;</td>
      <td class="col_right" width="85%"><input type="submit" name="Submit3" value="<?php echo $_smarty_tpl->getConfigVariable('button_submit');?>
" />
        <input type="button" name="Submit3" value="<?php echo $_smarty_tpl->getConfigVariable('button_back');?>
"onclick="location.href='<?php echo $_SESSION['grid_url'];?>
'"/></td>
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
      <td class="col_right"><input name="fullname" type="text" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['fullname'];?>
" /></td>
    </tr>
    <tr>
      <td class="col_left">Email</td>
      <td class="col_right"><input name="email" type="text" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['email'];?>
" /></td>
    </tr>
    <tr>
      <td class="col_left">Số điện thoại</td>
      <td class="col_right"><input name="phone" type="text" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['phone'];?>
" /></td>
    </tr>
    <tr>
      <td class="col_left">&nbsp;</td>
      <td class="col_right"><input type="submit" name="Submit3" value="<?php echo $_smarty_tpl->getConfigVariable('button_submit');?>
" />
        <input type="button" name="Submit3" value="<?php echo $_smarty_tpl->getConfigVariable('button_back');?>
" onclick="location.href='<?php echo $_SESSION['grid_url'];?>
'"/></td>
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


</script><?php }} ?>