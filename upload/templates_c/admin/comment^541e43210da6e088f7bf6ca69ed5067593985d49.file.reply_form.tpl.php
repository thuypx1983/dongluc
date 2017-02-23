<?php /* Smarty version Smarty-3.1.7, created on 2016-07-22 14:39:50
         compiled from "admin/modules/comment/templates/reply_form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9772245385791cdc6be5c83-01948492%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '541e43210da6e088f7bf6ca69ed5067593985d49' => 
    array (
      0 => 'admin/modules/comment/templates/reply_form.tpl',
      1 => 1431943420,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9772245385791cdc6be5c83-01948492',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'url' => 0,
    'msg' => 0,
    'row' => 0,
    'email_contact' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5791cdc7157cf',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5791cdc7157cf')) {function content_5791cdc7157cf($_smarty_tpl) {?>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
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
				<li class="TabbedPanelsTab" tabindex="0">Trả lời</li>
				<li class="TabbedPanelsTab" tabindex="0" style="display:none;">Tối ưu hóa OnPage</li>
			</ul>
			<div class="TabbedPanelsContentGroup">
				<div class="TabbedPanelsContent">
					<table width="100%" border="0" cellspacing="0" cellpadding="3">
						
						<tr>
							<td class="col_left">Câu hỏi</td>
							<td class="col_right" style="color:green"><?php echo $_smarty_tpl->tpl_vars['row']->value['content'];?>
</td>
						</tr>
						<tr>
							<td class="col_left">Comment for</td>
							<td class="col_right"><?php echo $_smarty_tpl->tpl_vars['row']->value['product_title'];?>
</td>
						</tr>
						<tr>
							<td class="col_left" valign="top">Xem chi tiết</td>
							<td class="col_right"><a href="http://<?php echo $_smarty_tpl->tpl_vars['row']->value['link'];?>
" target="_blank">http://<?php echo $_smarty_tpl->tpl_vars['row']->value['link'];?>
</a></td>
						</tr>

						<tr>
						  <td class="col_left">Trả lời với tên</td>
						  <td class="col_right">
							<input name="name" type="text"  value="Admin" size="80" />
							<input type="hidden" name="reply_to_name" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
" />
						  </td>
						</tr>
						<tr>
						  <td class="col_left">Email</td>
						  <td class="col_right">
							<input name="email" type="text" value="<?php echo $_smarty_tpl->tpl_vars['email_contact']->value;?>
" size="80" />
						  </td>
						</tr>
						<tr>
							<td class="col_left">Trả lời:</td>
							<td class="col_right">
								<?php if ($_smarty_tpl->tpl_vars['row']->value['parent_id']>0){?>
								<textarea name="content" rows="10" cols="60" disabled="disabled">Đây đã là câu trả lời, vui lòng quay trở lại</textarea>
								<?php }elseif($_smarty_tpl->tpl_vars['row']->value['is_replied']==1){?>
								<textarea name="content" rows="10" cols="60" disabled="disabled">Câu hỏi này đã có trả lời</textarea>
								<?php }else{ ?>
								<textarea name="content" rows="10" cols="60"	></textarea>
								<?php }?>
							</td>
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