<?php /* Smarty version Smarty-3.1.7, created on 2015-09-16 13:54:16
         compiled from "admin/modules/manage_ads/templates/ads.tpl" */ ?>
<?php /*%%SmartyHeaderCode:34992514055f91218308104-77302847%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b1ead52cd5b764a275bb55fdefef69ebf143771a' => 
    array (
      0 => 'admin/modules/manage_ads/templates/ads.tpl',
      1 => 1432697192,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '34992514055f91218308104-77302847',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'msg' => 0,
    'position' => 0,
    'row' => 0,
    'news_category' => 0,
    'ads_type' => 0,
    'target' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_55f9121846057',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55f9121846057')) {function content_55f9121846057($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/home/dongluc/public_html/lib/Smarty/plugins/function.html_options.php';
if (!is_callable('smarty_modifier_ckeditor')) include '/home/dongluc/public_html/lib/Smarty/plugins/modifier.ckeditor.php';
if (!is_callable('smarty_modifier_date_format')) include '/home/dongluc/public_html/lib/Smarty/plugins/modifier.date_format.php';
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
      <td class="col_left">Vị trí</td>
      <td class="col_right">
			<select name="position">
				<option value="">---</option>
				<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['position']->value,'selected'=>$_smarty_tpl->tpl_vars['row']->value['position']),$_smarty_tpl);?>

			</select>
      <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['position'];?>
" name="position_old" />
      <input type="hidden" value="" name="description" />
			<input type="hidden" value="0" name="news_category_id" />
      </td>
    </tr>
	<!-- <tr>
      <td class="col_left">Chuyên mục</td>
      <td class="col_right">
		<div id="div_news_category">
			<select name="news_category_id">
				<option value="">---</option>
				<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['news_category']->value,'selected'=>$_smarty_tpl->tpl_vars['row']->value['news_category_id']),$_smarty_tpl);?>

			</select>
		</div>
      </td>
    </tr> -->
    
	<tr>
      <td class="col_left">Ads type</td>
      <td class="col_right">
	  	<select name="ads_type" onchange="showEmbed(this.value)">
			<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['ads_type']->value,'selected'=>$_smarty_tpl->tpl_vars['row']->value['ads_type']),$_smarty_tpl);?>

		</select>	
	</td>
    </tr>
    
	 <tr id="div_embed" style="display:<?php if ($_smarty_tpl->tpl_vars['row']->value['ads_type']=='flash'){?>table-row<?php }else{ ?>none<?php }?>">
      <td class="col_left">Mã video</td>
      <td><div style="width:70%"><?php echo smarty_modifier_ckeditor('embed',$_smarty_tpl->tpl_vars['row']->value['embed'],'Video',500,500);?>
</div></td>
    </tr>
    
    <tr>
      <td class="col_left">Ảnh</td>
      <td class="col_right">
      <input name="photo" type="file" onchange="check_file_upload(this)" /><br />
      <?php if ($_smarty_tpl->tpl_vars['row']->value['photo']!=''){?>
			<img src="upload/ads/thumb/<?php echo $_smarty_tpl->tpl_vars['row']->value['photo'];?>
" style="max-height:300;max-width:300" /> <br />
			<input type="checkbox" name="che_delphoto" /> Xóa ảnh này ?
			<input type="hidden" name="hid_oldphoto" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['photo'];?>
" />
		<?php }?>
      </td>
    </tr>

    <!--<tr>
      <td class="col_left">Embed (Dành cho flash)</td>
      <td class="col_right">
		<textarea name="embed"><?php echo $_smarty_tpl->tpl_vars['row']->value['embed'];?>
</textarea>
	</td>
    </tr>-->
    <tr>
      <td class="col_left">Tiêu đề</td>
      <td class="col_right"><input name="title" type="text" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
" /></td>
    </tr>
	
	<!--<tr>
      <td class="col_left">Mô tả</td>
      <td class="col_right">
		<textarea name="description"><?php echo $_smarty_tpl->tpl_vars['row']->value['description'];?>
</textarea>
	</td>
    </tr>-->
	<tr>
      <td class="col_left">Liên kết ngoài</td>
      <td class="col_right">
		<input type="text" name="link" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['link'];?>
" size="80" />
	</td>
    </tr>
	<tr>
      <td class="col_left">Target</td>
      <td class="col_right">
		<select name="target">
			<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['target']->value,'selected'=>$_smarty_tpl->tpl_vars['row']->value['target']),$_smarty_tpl);?>

		</select>
	</td>
    </tr>
	<tr>
      <td class="col_left"><strong>Active?</strong></td>
      <td class="col_right"><input name="is_active" type="checkbox" value="1" <?php if ($_smarty_tpl->tpl_vars['row']->value['is_active']==1||$_GET['task']=='add'){?> checked="checked"<?php }?> /></td>
    </tr>
	<tr>
      <td class="col_left">Thứ tự</td>
      <td class="col_right">
		<input type="text" name="z_index" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['z_index'];?>
" />
	</td>
    </tr>
    <tr>
      <td class="col_left">Ngày tạo</td>
      <td class="col_right"><input name="create_date" type="text" value="<?php echo smarty_modifier_date_format((($tmp = @$_smarty_tpl->tpl_vars['row']->value['create_date'])===null||$tmp==='' ? time() : $tmp),'%Y-%m-%d');?>
" readonly="readonly" /></td>
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
function showEmbed(value) {
  if(value=='flash')
    $('#div_embed').show();
  else
    $('#div_embed').hide();

}
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