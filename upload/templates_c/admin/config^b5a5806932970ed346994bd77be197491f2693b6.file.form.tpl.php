<?php /* Smarty version Smarty-3.1.7, created on 2015-09-15 10:04:12
         compiled from "admin/modules/config/templates/form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:177554361055f78aac6c13b9-03280087%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b5a5806932970ed346994bd77be197491f2693b6' => 
    array (
      0 => 'admin/modules/config/templates/form.tpl',
      1 => 1402476906,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '177554361055f78aac6c13b9-03280087',
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
  'unifunc' => 'content_55f78aac74fae',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55f78aac74fae')) {function content_55f78aac74fae($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_ckeditor')) include '/home/dongluc/public_html/lib/Smarty/plugins/modifier.ckeditor.php';
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
      <td class="col_left">Code</td>
      <td class="col_right"><input name="name" type="text"  id="name" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
" /></td>
    </tr>
    <tr>
      <td class="col_left">Giá trị</td>
      <td class="col_right"><?php echo smarty_modifier_ckeditor("value",$_smarty_tpl->tpl_vars['row']->value['value']);?>
</td>
    </tr>
	<!--<tr>
      <td class="col_left">Giá trị 2</td>
      <td class="col_right"><input name="value2" type="text"  id="value2" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['value2'];?>
" /></td>
    </tr>
	<tr>
      <td class="col_left">Giá trị 3</td>
      <td class="col_right"><input name="value3" type="text"  id="value3" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['value3'];?>
" /></td>
    </tr>-->
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