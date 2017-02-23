<?php /* Smarty version Smarty-3.1.7, created on 2015-05-11 17:55:21
         compiled from "modules/ads/templates/home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:88615167355508a993999c4-43899340%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6e369f838385c559c72f836a529f4182c137ac56' => 
    array (
      0 => 'modules/ads/templates/home.tpl',
      1 => 1430973434,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '88615167355508a993999c4-43899340',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'rows' => 0,
    'row' => 0,
    'url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_55508a993cbb1',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55508a993cbb1')) {function content_55508a993cbb1($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['rows']->value){?>

<div class="slide_home">
	<script type="text/javascript">
		$(document).ready(function(){
		  $('.list_slide').bxSlider({
		  adaptiveHeight: true,
		  controls:false,
		  auto:true,
		  pager:true,
		  });
		})
	</script>
      <ul class="list_slide">
        <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['row']->key;
?>
			<li><a class="thumb300 thumbblock" href="<?php echo $_smarty_tpl->tpl_vars['row']->value['link'];?>
" <?php if (!$_smarty_tpl->tpl_vars['row']->value['link']){?>onclick="return false"<?php }?> title="<?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
" target="<?php echo $_smarty_tpl->tpl_vars['row']->value['target'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
upload/ads/1060x445/<?php echo $_smarty_tpl->tpl_vars['row']->value['photo'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
"/></a></li>
		<?php } ?>
      </ul>
</div>

<?php }?><?php }} ?>