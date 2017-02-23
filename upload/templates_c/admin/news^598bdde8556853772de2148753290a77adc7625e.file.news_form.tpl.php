<?php /* Smarty version Smarty-3.1.7, created on 2015-09-14 16:08:11
         compiled from "admin/modules/news/templates/news_form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:106976279955f68e7b96b561-75011993%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '598bdde8556853772de2148753290a77adc7625e' => 
    array (
      0 => 'admin/modules/news/templates/news_form.tpl',
      1 => 1432719462,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '106976279955f68e7b96b561-75011993',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'url' => 0,
    'msg' => 0,
    'menu_type' => 0,
    'row' => 0,
    'parent' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_55f68e7ba9f23',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55f68e7ba9f23')) {function content_55f68e7ba9f23($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/home/dongluc/public_html/lib/Smarty/plugins/function.html_options.php';
if (!is_callable('smarty_modifier_ckeditor')) include '/home/dongluc/public_html/lib/Smarty/plugins/modifier.ckeditor.php';
if (!is_callable('smarty_modifier_date_format')) include '/home/dongluc/public_html/lib/Smarty/plugins/modifier.date_format.php';
?><script type="text/javascript">
function getNewsCategory(value) {
	$.get("?ajax=true&mod=news&task=getNewsCategory&menu_type="+value, function(data){
		$('#div_news_category').html(data);
	});
}
</script>
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
				<li class="TabbedPanelsTab" tabindex="0">Thông tin bài viết</li>
				<li class="TabbedPanelsTab" tabindex="0">Tối ưu hóa OnPage</li>
			</ul>
			<div class="TabbedPanelsContentGroup">
				<div class="TabbedPanelsContent">
					<table border="0" cellpadding="3" cellspacing="0" style="margin-left:20px;">
                    	<!-- <tr>
						  <td class="col_left">Nhóm danh mục</td>
						  <td class="col_right">
                            <select name="menu_type" onchange="getNewsCategory(this.value)">
                                <option value="">---</option>
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['menu_type']->value,'selected'=>$_smarty_tpl->tpl_vars['row']->value['menu_type']),$_smarty_tpl);?>

                            </select>							
						  </td>
						</tr>
						 -->
						<tr>
						  <td class="col_left">Danh mục</td>
						  <td class="col_right">
                          	<div id="div_news_category">
	                            <select name="news_category_id">
	                                <option value="">---</option>
	                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['parent']->value,'selected'=>$_smarty_tpl->tpl_vars['row']->value['news_category_id']),$_smarty_tpl);?>

	                            </select>
	                            <input name="menu_type" type="hidden" value="" />
                            </div>
						  </td>
						</tr>
                        <!-- <tr>
                        	<td><hr/></td>
                            <td><hr/></td>
                        </tr> -->
						<tr>
							<td class="col_left">Tiêu đề</td>
							<td class="col_right"><input name="title" type="text" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
" size="70" /></td>
						</tr>
						<tr>
							<td class="col_left">Link</td>
							<td class="col_right"><input name="link" placeholder="Không nhập sẽ tự tạo link" type="text" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['link'];?>
" size="70" /><br /><?php echo $_smarty_tpl->tpl_vars['row']->value['link'];?>
</td>
						</tr>
                        <tr>
						  <td class="col_left">Ảnh</td>
						  <td class="col_right">
						  <input name="photo" type="file" id="photo" /><br />
                          <em>Vui lòng chọn ảnh đúng kích thước: 200x130</em><br>
							<?php if ($_smarty_tpl->tpl_vars['row']->value['photo']!=''){?>
								<img src="upload/news/thumb/<?php echo $_smarty_tpl->tpl_vars['row']->value['photo'];?>
" style="max-width:500px;" /> <br />
								<input type="checkbox" name="che_delphoto" /> Xóa ảnh này ?
								<input type="hidden" name="hid_oldphoto" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['photo'];?>
" />
							<?php }?>
						  </td>
						</tr>
                        <tr>
						  <td class="col_left">Mô tả</td>
						  <td><textarea name="description" cols="100" rows="8"><?php echo $_smarty_tpl->tpl_vars['row']->value['description'];?>
</textarea></td>
						</tr>
						<tr>
						  <td class="col_left">Nội dung</td>
						  <td><?php echo smarty_modifier_ckeditor('content',$_smarty_tpl->tpl_vars['row']->value['content'],'Full',850,800);?>
</td>
						</tr>
						<tr>
						  <td class="col_left">Thứ tự</td>

						  <td class="col_right"><input name="z_index" type="text" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['z_index'];?>
" /></td>
						</tr>
						<tr>
						  <td class="col_left">Ngày tạo</td>
						  <td class="col_right"><input name="create_date" type="text" value="<?php echo smarty_modifier_date_format((($tmp = @$_smarty_tpl->tpl_vars['row']->value['create_date'])===null||$tmp==='' ? time() : $tmp),'%Y-%m-%d');?>
" readonly /></td>
						</tr>
						<tr>
						  <td class="col_left"><strong>Kích hoạt?</strong></td>
						  <td class="col_right"><input name="is_active" type="checkbox" value="1" <?php if ($_smarty_tpl->tpl_vars['row']->value['is_active']==1||$_GET['task']=='add'){?> checked="checked"<?php }?> /></td>
						</tr>
                        <tr>
						  <td class="col_left"><strong>Nổi bật?</strong></td>
						  <td class="col_right"><input name="is_top" type="checkbox" value="1" <?php if ($_smarty_tpl->tpl_vars['row']->value['is_top']==1){?> checked="checked"<?php }?> /></td>
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
							<td><textarea name="seo_description" class="input" style="width:500px; height:100px;"><?php echo $_smarty_tpl->tpl_vars['row']->value['seo_photo_alt'];?>
</textarea></td>
						</tr>
						<tr>
							<td>Từ khóa (Meta)</td>
							<td><textarea name="seo_keyword" class="input"  style="width:500px; height:100px;"><?php echo $_smarty_tpl->tpl_vars['row']->value['seo_photo_alt'];?>
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
</script><?php }} ?>