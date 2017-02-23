<?php /* Smarty version Smarty-3.1.7, created on 2015-09-30 08:41:45
         compiled from "admin/modules/product_photo/templates/action.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1936569016560b3dd90e7cf0-31602593%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f5a824294f2de4fa603548d0a75fe19cd8b4726c' => 
    array (
      0 => 'admin/modules/product_photo/templates/action.tpl',
      1 => 1431590112,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1936569016560b3dd90e7cf0-31602593',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_560b3dd9102be',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_560b3dd9102be')) {function content_560b3dd9102be($_smarty_tpl) {?>
<script type="text/javascript">

$(function(){
	temp = $('#product_id');
	text = temp.find(':selected').text();
	
	parent = temp.parent().parent().parent().parent().parent().parent();
	parent
		.html("<div>Sản phẩm : "+text+"</div>");
});

</script>

<?php }} ?>