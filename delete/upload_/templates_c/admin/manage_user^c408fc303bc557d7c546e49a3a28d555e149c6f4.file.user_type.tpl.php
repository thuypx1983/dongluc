<?php /* Smarty version Smarty-3.1.7, created on 2015-05-12 10:13:44
         compiled from "admin/modules/manage_user/templates/user_type.tpl" */ ?>
<?php /*%%SmartyHeaderCode:59698421755516fe882a9d0-28872300%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c408fc303bc557d7c546e49a3a28d555e149c6f4' => 
    array (
      0 => 'admin/modules/manage_user/templates/user_type.tpl',
      1 => 1361346202,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '59698421755516fe882a9d0-28872300',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'row' => 0,
    'permission' => 0,
    'user_permission' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_55516fe887751',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55516fe887751')) {function content_55516fe887751($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_checkboxes')) include '/var/www/textlink/beta/dongluc/lib/Smarty/plugins/function.html_checkboxes.php';
?>

<form id="form1" name="form1" method="post" action="">
  <table border="0" cellpadding="3" cellspacing="0">
    <tr>
      <td align="right">Tên nhóm</td>
      <td><input name="title" type="text" class="input_text" id="title" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
" /></td>
    </tr>
    <tr>
      <td align="right">Ghi chú</td>
      <td><textarea name="description" class="input_text" id="description"><?php echo $_smarty_tpl->tpl_vars['row']->value['description'];?>
</textarea> </td>
    </tr>
    <tr>
		<td align="right" valign="top"><b>Nhóm mặc định</b></td>
		<td valign="top" align="left">	<input name="is_registered" type="checkbox" value="1" <?php if ($_smarty_tpl->tpl_vars['row']->value['is_registered']==1){?> checked="checked" <?php }?>/></td>
	</tr>
    <tr>
      <td align="right">Quyền được truy cập</td>
      <td>
      		<div id="div_permission" style="max-height: 300px; width:200px; overflow: auto; border: 1px solid gray; padding: 10px;">
      		<?php echo smarty_function_html_checkboxes(array('name'=>'permission','options'=>$_smarty_tpl->tpl_vars['permission']->value,'selected'=>$_smarty_tpl->tpl_vars['user_permission']->value,'separator'=>'<br />'),$_smarty_tpl);?>

      		</div>
            <label><input type="checkbox" onchange="$('#div_permission').find(':checkbox').attr('checked', this.checked);" /> Chọn/ Bỏ chọn tất cả</label>
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Đồng ý" />
      <input type="button" name="Submit2" value="Quay lại" onclick="window.location.href = '<?php echo $_COOKIE['re_dir'];?>
'"/></td>
    </tr>
  </table>
</form><?php }} ?>