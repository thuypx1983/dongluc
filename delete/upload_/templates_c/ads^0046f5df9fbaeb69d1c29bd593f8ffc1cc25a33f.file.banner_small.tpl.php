<?php /* Smarty version Smarty-3.1.7, created on 2015-05-11 17:55:21
         compiled from "modules/ads/templates/banner_small.tpl" */ ?>
<?php /*%%SmartyHeaderCode:149824953555508a993d32e0-78466188%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0046f5df9fbaeb69d1c29bd593f8ffc1cc25a33f' => 
    array (
      0 => 'modules/ads/templates/banner_small.tpl',
      1 => 1431047012,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '149824953555508a993d32e0-78466188',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'rows' => 0,
    'k' => 0,
    'row' => 0,
    'url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_55508a9940a30',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55508a9940a30')) {function content_55508a9940a30($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['rows']->value){?>
	<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['row']->key;
?>
    	<?php if ($_smarty_tpl->tpl_vars['k']->value<2){?>
    	<li><a href="<?php echo $_smarty_tpl->tpl_vars['row']->value['link'];?>
" <?php if (!$_smarty_tpl->tpl_vars['row']->value['link']){?>onclick="return false"<?php }?> title="<?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
" target="<?php echo $_smarty_tpl->tpl_vars['row']->value['target'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
upload/ads/334x216/<?php echo $_smarty_tpl->tpl_vars['row']->value['photo'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
"/></a></li>
    	<?php }?>
    <?php } ?>
<?php }?><?php }} ?>