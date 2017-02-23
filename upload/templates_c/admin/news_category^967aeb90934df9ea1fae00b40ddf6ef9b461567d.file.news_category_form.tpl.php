<?php /* Smarty version Smarty-3.1.7, created on 2015-09-14 16:06:08
         compiled from "admin/modules/news_category/templates/news_category_form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:108788831355f68e00bc65f8-26239770%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '967aeb90934df9ea1fae00b40ddf6ef9b461567d' => 
    array (
      0 => 'admin/modules/news_category/templates/news_category_form.tpl',
      1 => 1430810956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '108788831355f68e00bc65f8-26239770',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'url' => 0,
    'msg' => 0,
    'row' => 0,
    'parent' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_55f68e00cd7ca',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55f68e00cd7ca')) {function content_55f68e00cd7ca($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/home/dongluc/public_html/lib/Smarty/plugins/function.html_options.php';
if (!is_callable('smarty_modifier_ckeditor')) include '/home/dongluc/public_html/lib/Smarty/plugins/modifier.ckeditor.php';
?>
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
				<li class="TabbedPanelsTab" tabindex="0">Thông tin</li>
				<li class="TabbedPanelsTab" tabindex="0">Tối ưu hóa OnPage</li>
			</ul>
			<div class="TabbedPanelsContentGroup">
				<div class="TabbedPanelsContent">
					<table width="100%" border="0" cellspacing="0" cellpadding="3">
						<tr>
						  <td class="col_left">ID</td>
						  <td class="col_right">
							<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>

						  </td>
						</tr>
						
						<tr>
						  <td class="col_left">Dịch vụ cha</td>
						  <td class="col_right">
								<select name="parent_id" onchange="get_menu_type_parent(this.value)">
								<option value="">---</option>
								<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['parent']->value,'selected'=>$_smarty_tpl->tpl_vars['row']->value['parent_id']),$_smarty_tpl);?>

							</select>
							
						  </td>
						</tr>

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
                            <td class="col_left" valign="top">Thumb</td>
                            <td class="col_right">
                                <input name="thumb" type="file" onchange="check_file_upload(this)" /><br />
                                <?php if ($_smarty_tpl->tpl_vars['row']->value['thumb']!=''){?>
                                    <img src="upload/category/252x158/<?php echo $_smarty_tpl->tpl_vars['row']->value['thumb'];?>
" /> <br />
                                    <input type="checkbox" name="che_delthumb" /> Xóa ảnh này ?
                                    <input type="hidden" name="hid_oldthumb" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['thumb'];?>
" />
                                <?php }?>                            
                            </td>
						</tr>
						<tr>
						  <td class="col_left" valign="top">Liên kết ngoài</td>
						  <td class="col_right"><input name="link_to" type="text" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['link_to'];?>
" size="70" />
						  	<br/>
						  	<font color="green">(Nếu danh mục này liên kết ra ngoài)</font>
						 	</td>
						</tr>
						<tr>
						  <td class="col_left">Nội dung</td>
						  <td><?php echo smarty_modifier_ckeditor('content',$_smarty_tpl->tpl_vars['row']->value['content'],'Full',850,300);?>
</td>
						</tr>		
						<tr>
						  <td class="col_left">Thứ tự</td>
						  <td class="col_right"><input name="z_index" type="text" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['z_index'];?>
" /></td>
						</tr>
                        
                        <tr>
						  <td class="col_left"><strong>Hiện?</strong></td>
						  <td class="col_right"><input name="is_active" type="checkbox" value="1" <?php if ($_smarty_tpl->tpl_vars['row']->value['is_active']==1||$_GET['task']=='add'){?> checked="checked"<?php }?> /></td>
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
<script type="text/javascript">

function check_file_upload(obj){
    var FileSize = obj.files[0].size/(1024*1024);
    var FileExt = obj.value.substr(obj.value.lastIndexOf('.')+1);
    var FileName = obj.files[0].name;
    FileExt = FileExt.toLowerCase();
    console.log(FileSize);
    console.log(FileExt);
    console.log(FileName);
    
	if (FileSize > 1) {
    	alert("Maximum file size is 1 MB");
    	obj.value = '';
    }
}
</script><?php }} ?>