<?php /* Smarty version Smarty-3.1.7, created on 2015-09-15 10:03:38
         compiled from "admin/modules/contact/templates/contact_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:46640888855f78a8a8b2b48-30568846%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2797d871e5bfde947e53f18dc01c6d1123ad7e32' => 
    array (
      0 => 'admin/modules/contact/templates/contact_edit.tpl',
      1 => 1416903064,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '46640888855f78a8a8b2b48-30568846',
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
  'unifunc' => 'content_55f78a8a916fa',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55f78a8a916fa')) {function content_55f78a8a916fa($_smarty_tpl) {?>
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
  <table border="0" cellpadding="3" cellspacing="0">
  <?php if ($_smarty_tpl->tpl_vars['msg']->value){?>
  	<tr>
      <td align="right"></td>
      <td style="color: #F00;"><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</td>
    </tr>
  <?php }?>
	<tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Submit" />
      <input type="button" name="Submit2" value="<?php echo $_smarty_tpl->getConfigVariable('button_back');?>
" onclick="location.href='<?php echo $_SESSION['grid_url'];?>
'"/></td>
    </tr>
	<tr>
      <td align="right">Thư liên hệ sẽ được gửi tới email:</td>
      <td><input name="email_contact" type="text" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['email_contact'];?>
" size="80" /></td>
    </tr>
	
		
	
	
	<tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Submit" />
      <input type="button" name="Submit2" value="<?php echo $_smarty_tpl->getConfigVariable('button_back');?>
" onclick="location.href='<?php echo $_SESSION['grid_url'];?>
'"/></td>
    </tr>
	
  </table>
</form><?php }} ?>