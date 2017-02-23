<?php /* Smarty version Smarty-3.1.7, created on 2016-05-07 15:31:53
         compiled from "admin/modules/region/templates/region_form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1534240263572da7f9c805f3-42116358%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0c71927cebeef53463b32d6d1420c559576222a0' => 
    array (
      0 => 'admin/modules/region/templates/region_form.tpl',
      1 => 1431049326,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1534240263572da7f9c805f3-42116358',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'url' => 0,
    'msg' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_572da7f9d4ab6',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_572da7f9d4ab6')) {function content_572da7f9d4ab6($_smarty_tpl) {?><script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
SpryAssets/SpryTabbedPanels.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
SpryAssets/SpryTabbedPanels.css" />
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data" style="padding:20px;">
		<input type="submit" name="Submit" value="<?php echo $_smarty_tpl->getConfigVariable('button_submit');?>
" />
	    <input type="button" name="Submit2" value="<?php echo $_smarty_tpl->getConfigVariable('button_back');?>
" onclick="location.href='<?php echo $_SESSION['grid_url'];?>
'"/>
		<div style="color:red; margin-top:10px;"><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</div>
		<div id="TabbedPanels1" class="TabbedPanels" style="margin-top:10px;">
			<ul class="TabbedPanelsTabGroup">
				<li class="TabbedPanelsTab" tabindex="0">Thông tin</li>
				<li class="TabbedPanelsTab" tabindex="0" style="display:none">Tối ưu hóa OnPage</li>
			</ul>
			<div class="TabbedPanelsContentGroup">
				<div class="TabbedPanelsContent">
					<table width="100%" border="0" cellspacing="0" cellpadding="3">
						<tr>
						  <td class="col_left">Tiêu đề</td>
						  <td class="col_right">
							<input name="title" type="text"  value="<?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
" size="70" />
						  </td>
						</tr>
						<tr>
						  <td class="col_left">Đường dẫn</td>
						  <td class="col_right">
							<input name="link" placeholder="Không nhập sẽ tự tạo link" type="text" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['link'];?>
" size="70" /> (Không nhập sẽ tự tạo link)<br />
							<?php echo $_smarty_tpl->tpl_vars['row']->value['link'];?>

						  </td>
						</tr>
                        <tr>
						  <td class="col_left">Thứ tự</td>
						  <td class="col_right"><input name="z_index" type="text" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['z_index'];?>
" /></td>
						</tr>
					  </table>
				</div>
				<div class="TabbedPanelsContent">
					<table width="100%" cellpadding="6" cellspacing="0">
						<tr>
							<td width="100px">Tiêu đề (Meta)</td>
							<td><input name="seo_title" class="input" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['seo_title'];?>
" style="width:500px;" /></td>
						</tr>
						<tr>
							<td>Mô tả (Meta)</td>
							<td><textarea name="seo_description" class="input" style="width:500px; height:100px;"><?php echo $_smarty_tpl->tpl_vars['row']->value['seo_description'];?>
</textarea></td>
						</tr>
						<tr>
							<td>Từ khóa (Meta)</td>
							<td><textarea name="seo_keyword" class="input"  style="width:500px; height:100px;"><?php echo $_smarty_tpl->tpl_vars['row']->value['seo_keyword'];?>
</textarea></td>
						</tr>
					</table>
				</div>
			</div>
			
		</div>
		
		<input type="submit" name="Submit" value="<?php echo $_smarty_tpl->getConfigVariable('button_submit');?>
" />
	    <input type="button" name="Submit2" value="<?php echo $_smarty_tpl->getConfigVariable('button_back');?>
" onclick="location.href='<?php echo $_SESSION['grid_url'];?>
'"/>  
</form>
<script type="text/javascript">
	var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1", { defaultTab:0 });
</script>





<?php }} ?>