<?php /* Smarty version Smarty-3.1.7, created on 2016-10-06 11:16:43
         compiled from "admin/modules/product/templates/product_form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:59700236255f68eaea5d763-78944534%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '42882b8acc65a741b54d26afd9f44b12ea650b8c' => 
    array (
      0 => 'admin/modules/product/templates/product_form.tpl',
      1 => 1475721557,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '59700236255f68eaea5d763-78944534',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_55f68eaeca300',
  'variables' => 
  array (
    'url' => 0,
    'msg' => 0,
    'row' => 0,
    'type' => 0,
    'price' => 0,
    'size' => 0,
    'colors' => 0,
    'c' => 0,
    'material' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55f68eaeca300')) {function content_55f68eaeca300($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/home/dongluc/public_html/lib/Smarty/plugins/function.html_options.php';
if (!is_callable('smarty_function_html_radios')) include '/home/dongluc/public_html/lib/Smarty/plugins/function.html_radios.php';
if (!is_callable('smarty_function_html_checkboxes')) include '/home/dongluc/public_html/lib/Smarty/plugins/function.html_checkboxes.php';
if (!is_callable('smarty_modifier_ckeditor')) include '/home/dongluc/public_html/lib/Smarty/plugins/modifier.ckeditor.php';
?><script type="text/javascript">

$(function(){
	$('.format').keyup(function(){
		$(this).parent().find('.price_thumb').html(accounting.formatNumber( $(this).val() ) );
	});
	
	$('.price_sale').keyup(function(){
		price_sale = $(this).val();
		price = $('[name="price"]').val();
		rs = 100 - (price_sale*100 / price);
		
		$('.discount_thumb').html(accounting.formatNumber(rs));
		$('.discount').val(rs);
	});
	
	$('.discount').keyup(function(){
		price = $('[name="price"]').val();
		discount = $(this).val();
		if(price >= 0 && discount >= 0) {
			rs = price - (price*discount*0.01);
			$('.price_sale_thumb').html(accounting.formatNumber(rs));
			$('.price_sale').val(rs);
		}
		//$('.discount_thumb').html(accounting.formatNumber( $(this).val() ) );
	});
});

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
				<li class="TabbedPanelsTab" tabindex="0">Thông tin</li>
				<li class="TabbedPanelsTab" tabindex="0">Tối ưu hóa OnPage</li>
			</ul>
			<div class="TabbedPanelsContentGroup">
				<div class="TabbedPanelsContent">
					<table border="0" cellpadding="3" cellspacing="0" style="margin-left:20px;">
                    	<tr>
						  <td class="col_left">ID</td>
						  <td class="col_right">
							<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>

						  </td>
						</tr>
						<tr>
						  <td class="col_left" style="width:150px">Danh mục</td>
						  <td class="col_right">
							<select name="product_type_id">
								<option value="">---</option>
								<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['type']->value,'selected'=>$_smarty_tpl->tpl_vars['row']->value['product_type_id']),$_smarty_tpl);?>

							</select>
						  </td>
						</tr>
						<tr>
						  <td class="col_left">
						  	Ảnh (480*480)
						  	<?php if ($_GET['task']=='edit'){?><div>[<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
admin.php?mod=product_photo&mod_id=<?php echo $_GET['id'];?>
" target="_blank">Quản lý ảnh PHOTO</a>]</div><?php }?>
						  </td>
						  <td class="col_right">
						  <input name="photo" type="file" onchange="check_file_upload(this)" id="photo" /><br />
							<?php if ($_smarty_tpl->tpl_vars['row']->value['photo']!=''){?>
								<img src="upload/product/thumb/<?php echo $_smarty_tpl->tpl_vars['row']->value['photo'];?>
" style="max-width:500px;" /> <br />
								<input type="checkbox" name="che_delphoto" /> Xóa ảnh này ?
								<input type="hidden" name="hid_oldphoto" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['photo'];?>
" />
							<?php }?>
						  </td>
						</tr>
						<tr>
							<td class="col_left">Mã hàng</td>
							<td class="col_right"><input name="code" type="text" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['code'];?>
" /></td>
						</tr>
						<tr>
							<td class="col_left">Tên SP</td>
							<td class="col_right"><input name="title" type="text" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
" size="80"/></td>
						</tr>
						<tr>
							<td class="col_left">Đường dẫn</td>
							<td class="col_right"><input name="link" placeholder="Không nhập sẽ tự tạo link" type="text" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['link'];?>
" size="80"/> (Không nhập sẽ tự tạo link)<br /><?php echo $_smarty_tpl->tpl_vars['row']->value['link'];?>
</td>
						</tr>
                        <tr>
							<td class="col_left">Liên kết ngoài</td>
							<td class="col_right"><input name="link_out" type="text" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['link_out'];?>
" size="60"/></td>
						</tr>
                        <tr>
						  <td class="col_left">Giá gốc (vnđ)</td>
						  <td><input name="price" class="format" type="text" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['price'];?>
" />&nbsp;<span class="price_thumb"><?php echo number_format($_smarty_tpl->tpl_vars['row']->value['price'],0,".",",");?>
</span>&nbsp;vnđ</td>
						</tr>
						<tr>
						  <td class="col_left">Giảm giá (%)</td>
							<td>
								<input name="discount" autocomplete="off" class="discount" type="text" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['discount'];?>
" />&nbsp;<span class="discount_thumb"><?php echo number_format($_smarty_tpl->tpl_vars['row']->value['discount'],0,".",",");?>
</span>%
							</td>
						</tr>
						<tr>
						  <td class="col_left">Giá bán thực (vnđ)</td>
							<td>
                                <?php if ($_smarty_tpl->tpl_vars['row']->value['price']>0){?>
                                <input name="price_sale" autocomplete="off" class="price_sale format" type="text" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['price']-($_smarty_tpl->tpl_vars['row']->value['price']*$_smarty_tpl->tpl_vars['row']->value['discount']*0.01);?>
" />&nbsp;<span class="price_sale_thumb price_thumb"><?php echo number_format(($_smarty_tpl->tpl_vars['row']->value['price']-($_smarty_tpl->tpl_vars['row']->value['price']*$_smarty_tpl->tpl_vars['row']->value['discount']*0.01)),0,".",",");?>
</span>&nbsp;vnđ
                                <?php }else{ ?>
                                <input name="price_sale" autocomplete="off" class="price_sale format" type="text" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['price_sale'];?>
" />&nbsp;<span class="price_sale_thumb price_thumb"><?php echo number_format(($_smarty_tpl->tpl_vars['row']->value['price_sale']),0,".",",");?>
</span>&nbsp;vnđ
                                <?php }?>
                            </td>
						</tr>
						<!-- <tr>
							<td class="col_left" valign="top">Khoảng giá</td>
							<td class="col_right">
								<div class="label_float">
								<?php echo smarty_function_html_radios(array('name'=>'price_id','options'=>$_smarty_tpl->tpl_vars['price']->value,'selected'=>$_smarty_tpl->tpl_vars['row']->value['price_id'],'separator'=>'<br/>'),$_smarty_tpl);?>

								</div>
							</td>
						</tr> -->
						<tr>
							<td class="col_left" valign="top"></td>
							<td class="col_right"><input type="hidden" name="price_id" value=""/></td>
						</tr>
						<tr>
							<td class="col_left" valign="top">Kích cỡ</td>
							<td class="col_right">
								<div class="label_float div_size">
								<label><input type="checkbox" onchange="$('.div_size').find(':checkbox').attr('checked', this.checked);" /> <small>Chọn/ Bỏ chọn tất cả</small></label>
								<?php echo smarty_function_html_checkboxes(array('name'=>'size_id','options'=>$_smarty_tpl->tpl_vars['size']->value,'selected'=>$_smarty_tpl->tpl_vars['row']->value['size_id']),$_smarty_tpl);?>

								
								</div>
							</td>
						</tr>
						<tr>
							<td class="col_left" valign="top">Màu sắc</td>
							<td class="col_right">
								<div class="label_float label_color div_color">
									<label><span style="border:none"><input type="checkbox" onchange="$('.div_color').find(':checkbox').attr('checked', this.checked);" /></span><small>Chọn/ Bỏ chọn tất cả</small></label>
									<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['colors']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
$_smarty_tpl->tpl_vars['c']->_loop = true;
?>
										<label>
											<span style="background:<?php echo $_smarty_tpl->tpl_vars['c']->value['color_code'];?>
"><input <?php if (in_array($_smarty_tpl->tpl_vars['c']->value['id'],$_smarty_tpl->tpl_vars['row']->value['color_id'])){?>checked<?php }?> type="checkbox" name="color_id[]" value="<?php echo $_smarty_tpl->tpl_vars['c']->value['id'];?>
"></span><?php echo $_smarty_tpl->tpl_vars['c']->value['title'];?>

										</label>
									<?php } ?>
									
								</div>
							</td>
						</tr>
						
						<tr>
							<td class="col_left" valign="top">Chất liệu</td>
							<td class="col_right">
								<div class="label_float div_material">
								<label><input type="checkbox" onchange="$('.div_material').find(':checkbox').attr('checked', this.checked);" /> <small>Chọn/ Bỏ chọn tất cả</small></label>
								<?php echo smarty_function_html_checkboxes(array('name'=>'material_id','options'=>$_smarty_tpl->tpl_vars['material']->value,'selected'=>$_smarty_tpl->tpl_vars['row']->value['material_id']),$_smarty_tpl);?>

								
								</div>
							</td>
						</tr>
						

						<tr>
						  <td class="col_left">Nội dung</td>
						  <td><?php echo smarty_modifier_ckeditor('content',$_smarty_tpl->tpl_vars['row']->value['content'],'Full');?>
</td>
						</tr>
						<tr>
						  <td class="col_left">Mã video</td>
						  <td><div style="width:70%"><?php echo smarty_modifier_ckeditor('embed',$_smarty_tpl->tpl_vars['row']->value['embed'],'Video',500,500);?>
</div></td>
						</tr>
						<tr>
						  <td class="col_left">Thứ tự</td>
						  <td class="col_right"><input name="z_index" type="text" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['z_index'];?>
" /></td>
						</tr>
						<tr>
						  <td class="col_left"><strong>Nổi bật?</strong></td>
						  <td class="col_right"><input name="is_top" type="checkbox" value="1" <?php if ($_smarty_tpl->tpl_vars['row']->value['is_top']==1||$_GET['task']=='add'){?> checked="checked"<?php }?> /></td>
						</tr>
						<tr>
						  <td class="col_left"><strong>Kích hoạt?</strong></td>
						  <td class="col_right"><input name="is_active" type="checkbox" value="1" <?php if ($_smarty_tpl->tpl_vars['row']->value['is_active']==1||$_GET['task']=='add'){?> checked="checked"<?php }?> /></td>
						</tr>
						<!-- <tr>
						  <td class="col_left" colspan="2">Created by <strong><?php echo $_smarty_tpl->tpl_vars['row']->value['user_id'];?>
</strong> on <strong><?php echo $_smarty_tpl->tpl_vars['row']->value['create_date'];?>
</strong></td>
						</tr>
                        <?php if ($_smarty_tpl->tpl_vars['row']->value['update_user']!=''){?>
                        <tr>
						  <td class="col_left" colspan="2">LastUpdated by <strong><?php echo $_smarty_tpl->tpl_vars['row']->value['update_user'];?>
</strong> on <strong><?php echo $_smarty_tpl->tpl_vars['row']->value['update_date'];?>
</strong></td>
						</tr>
                        <?php }?> -->
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
</script>

<style type="text/css">
.label_float {
	border-bottom:1px solid #ccc; 
	padding-bottom:8px; 
	margin-bottom:8px; 
	display:inline-block; 
	padding-right:20px;	
}
.label_float label {
	float:left;
	width:250px;
}
.label_color {
	
}
.label_color span{
	padding: 3px;
	margin-right: 5px;
	border:1px solid #ccc;
	display: inline-block;
}
</style><?php }} ?>