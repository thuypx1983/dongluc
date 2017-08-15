<?php /* Smarty version Smarty-3.1.7, created on 2015-05-12 10:13:30
         compiled from "admin/modules/manage_user/templates/user.tpl" */ ?>
<?php /*%%SmartyHeaderCode:175719230455516fdac0c0d1-43504338%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dfee1f4eda984d98d1f0eeaf3b1c1fbde783fbed' => 
    array (
      0 => 'admin/modules/manage_user/templates/user.tpl',
      1 => 1397983980,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '175719230455516fdac0c0d1-43504338',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'msg' => 0,
    'user_type' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_55516fdac7914',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55516fdac7914')) {function content_55516fdac7914($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/var/www/textlink/beta/dongluc/lib/Smarty/plugins/function.html_options.php';
if (!is_callable('smarty_modifier_date_format')) include '/var/www/textlink/beta/dongluc/lib/Smarty/plugins/modifier.date_format.php';
?>
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
  <table width="100%" border="0" cellspacing="0" cellpadding="3">
    <tr>
      <td width="15%" class="col_left">&nbsp;</td>
      <td width="85%" class="col_right"><div style="color: red;"><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</div></td>
    </tr>
    <tr>
      <td class="col_left">&nbsp;</td>
      <td class="col_right"><input type="submit" name="Submit3" value="<?php echo $_smarty_tpl->getConfigVariable('button_submit');?>
" />
        <input type="button" name="Submit3" value="<?php echo $_smarty_tpl->getConfigVariable('button_back');?>
"onclick="location.href='<?php echo $_SESSION['grid_url'];?>
'"/></td>
    </tr>
    <tr>
      <td class="col_left">Loại người dùng</td>
      <td class="col_right"><select name="user_type_id" id="user_type_id">
<option value=''>---</option>
		<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['user_type']->value,'selected'=>(($tmp = @$_smarty_tpl->tpl_vars['row']->value['user_type_id'])===null||$tmp==='' ? $_SESSION['user_type_id'] : $tmp)),$_smarty_tpl);?>

                
                
</select></td>
    </tr>
    <tr>
<td class="col_left">Username</td>
<td class="col_right"><input size="50" maxlength="255" name="username" type="text" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['username'];?>
" /></td>
</tr>
    <tr>
<td class="col_left">Email</td>
<td class="col_right"><input size="50" maxlength="255" name="email" type="text" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['email'];?>
" /></td>
</tr>
<tr>
<td class="col_left">Mật khẩu</td>
<td class="col_right"><input size="50" maxlength="255" name="password" type="password" /></td>
</tr>
<tr>
<td class="col_left">Ngày tạo</td>
<td class="col_right"><input size="50" maxlength="255" name="create_date" type="text" value="<?php echo smarty_modifier_date_format((($tmp = @$_smarty_tpl->tpl_vars['row']->value['create_date'])===null||$tmp==='' ? time() : $tmp),'%Y-%m-%d %H:%M:%S');?>
" readonly="readonly" /></td>
</tr>
<tr>
<td class="col_left"><b>Kích hoạt</b></td>
<td class="col_right"><input name="is_active" type="checkbox" value="1" <?php if ($_smarty_tpl->tpl_vars['row']->value['is_active']==1){?> checked="checked" <?php }?>/></td>
</tr>
<tr>
<td class="col_left">Tên đầy đủ</td>
<td class="col_right"><input name="fullname" type="text" id="fullname" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['fullname'];?>
" size="50" maxlength="255" /></td>
</tr>
<tr>
<td class="col_left">Địa chỉ</td>
<td class="col_right"><input size="50" maxlength="255" name="address" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['address'];?>
" type="text" /></td>
</tr>
<tr>
<td class="col_left">Điện thoại</td>
<td class="col_right"><input name="phone" type="text" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['phone'];?>
" size="50" maxlength="255" /></td>
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

  
</form><?php }} ?>