<?php /* Smarty version Smarty-3.1.7, created on 2016-11-09 17:11:52
         compiled from "admin/modules/product_photo/templates/product_photo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17843462195822f668e15714-83822148%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '92b1ebc312a4ff1aa48322c2318a1d08a6fed82f' => 
    array (
      0 => 'admin/modules/product_photo/templates/product_photo.tpl',
      1 => 1431590894,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17843462195822f668e15714-83822148',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'msg' => 0,
    'product_info' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5822f66900d94',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5822f66900d94')) {function content_5822f66900d94($_smarty_tpl) {?>
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
  <table width="100%" border="0" cellspacing="0" cellpadding="5">
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
    <tr style="font-style:oblique; font-size:14px; font-weight:bold; color:#666;">
      <td class="col_left">Ảnh của</td>
      <td class="col_right">
      	<?php echo $_smarty_tpl->tpl_vars['product_info']->value['title'];?>
 (<?php echo $_smarty_tpl->tpl_vars['product_info']->value['code'];?>
)
        <input name="title" type="hidden" value="" />
      </td>
    </tr>
    <tr>
      <td class="col_left">Photo</td>
      <td class="col_right">
      	<input type="file" name="photo" onchange="check_file_upload(this)" id="photo" />
      </td>
    </tr>
    <!-- <tr>
      <td class="col_left">Tiêu đề</td>
      <td class="col_right"><input name="title" type="text"  id="title" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
" size="80"/></td>
    </tr> -->
    <tr>
      <td class="col_left">Thứ tự</td>
      <td class="col_right"><input name="z_index" type="text"  id="z_index" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['z_index'];?>
" /></td>
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