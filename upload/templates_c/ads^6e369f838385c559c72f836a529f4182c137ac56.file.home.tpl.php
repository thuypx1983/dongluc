<?php /* Smarty version Smarty-3.1.7, created on 2017-02-22 09:49:31
         compiled from "modules/ads/templates/home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:166115784555f6774634b922-65845030%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6e369f838385c559c72f836a529f4182c137ac56' => 
    array (
      0 => 'modules/ads/templates/home.tpl',
      1 => 1432736006,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '166115784555f6774634b922-65845030',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_55f6774638db3',
  'variables' => 
  array (
    'rows' => 0,
    'row' => 0,
    'url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55f6774638db3')) {function content_55f6774638db3($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['rows']->value){?>

<div class="slide_home">
	<script type="text/javascript">
		$(document).ready(function(){
		  $('.list_slide').bxSlider({
			  adaptiveHeight: true,
			  controls:false,
			  auto:true,
			  autoHover:false,
			  pager:true,
			  pause:3000,
			  autoStart:true,
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
upload/ads/<?php echo $_smarty_tpl->tpl_vars['row']->value['photo'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
"/></a></li>
		<?php } ?>
      </ul>
</div>

<?php }?><?php }} ?>