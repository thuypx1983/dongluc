<?php /* Smarty version Smarty-3.1.7, created on 2015-05-11 17:55:21
         compiled from "modules/ads/templates/banner_sidebar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:114319873255508a998e30e0-93721405%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '926d0d897d890d5f78817f5f83ebdd330603a782' => 
    array (
      0 => 'modules/ads/templates/banner_sidebar.tpl',
      1 => 1431164386,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '114319873255508a998e30e0-93721405',
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
  'unifunc' => 'content_55508a9992152',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55508a9992152')) {function content_55508a9992152($_smarty_tpl) {?><a href="" class="head_title">Quảng cáo</a>
<?php if ($_smarty_tpl->tpl_vars['rows']->value){?>
	<div>
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
upload/ads/270x400/<?php echo $_smarty_tpl->tpl_vars['row']->value['photo'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
"/></a>
    	<?php }?>
    <?php } ?>
    </div>
<?php }?><?php }} ?>