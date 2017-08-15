<?php /* Smarty version Smarty-3.1.7, created on 2015-05-11 17:55:21
         compiled from "modules/ads/templates/banner_big.tpl" */ ?>
<?php /*%%SmartyHeaderCode:163404898255508a994118d3-37539724%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3440bc959343f08b38275e565f48f9bde8f95700' => 
    array (
      0 => 'modules/ads/templates/banner_big.tpl',
      1 => 1431314447,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '163404898255508a994118d3-37539724',
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
  'unifunc' => 'content_55508a99448b2',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55508a99448b2')) {function content_55508a99448b2($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['rows']->value){?>
<div class="content_home pkg banner_big">
	<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['row']->key;
?>
    	<?php if ($_smarty_tpl->tpl_vars['k']->value==0){?>
    	<a href="<?php echo $_smarty_tpl->tpl_vars['row']->value['link'];?>
" <?php if (!$_smarty_tpl->tpl_vars['row']->value['link']){?>onclick="return false"<?php }?> title="<?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
" target="<?php echo $_smarty_tpl->tpl_vars['row']->value['target'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
upload/ads/1060x454/<?php echo $_smarty_tpl->tpl_vars['row']->value['photo'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
"/></a>
    	<?php }?>
    <?php } ?>
</div>
<?php }?><?php }} ?>