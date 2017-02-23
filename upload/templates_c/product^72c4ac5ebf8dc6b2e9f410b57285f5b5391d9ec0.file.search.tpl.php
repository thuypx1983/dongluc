<?php /* Smarty version Smarty-3.1.7, created on 2017-02-22 09:49:31
         compiled from "modules/product/templates/search.tpl" */ ?>
<?php /*%%SmartyHeaderCode:70276460155f6773755b6c2-19813472%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '72c4ac5ebf8dc6b2e9f410b57285f5b5391d9ec0' => 
    array (
      0 => 'modules/product/templates/search.tpl',
      1 => 1431934266,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '70276460155f6773755b6c2-19813472',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_55f67737564e6',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55f67737564e6')) {function content_55f67737564e6($_smarty_tpl) {?>
<script type="text/javascript">

function submit_search(obj) {
	var txtSearch = obj.find('.txt_search_primary');
	//console.log(txtSearch.val());
	//.replace(/\s+/g,"+");
	
	location.href = url +'san-pham/&keyword='+txtSearch.val().replace(/\s+/g,"+");
	return false;
}
		
</script>
<div class="search_main">
	<form id="formSeach" method="" onsubmit="return submit_search($(this))">
		<input type="text" placeholder="tìm kiếm..." value="<?php echo $_GET['keyword'];?>
" class="txt_search txt_search_primary" />
	</form>
</div><?php }} ?>