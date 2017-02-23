<?php /* Smarty version Smarty-3.1.7, created on 2017-02-22 10:05:49
         compiled from "modules/news/templates/list_top.tpl" */ ?>
<?php /*%%SmartyHeaderCode:142245150655f6a4cfb577e7-45963876%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4bdf61a0ad07395e649c04bcc313397acabe926b' => 
    array (
      0 => 'modules/news/templates/list_top.tpl',
      1 => 1431163584,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '142245150655f6a4cfb577e7-45963876',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_55f6a4cfb83ee',
  'variables' => 
  array (
    'rows' => 0,
    'url' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55f6a4cfb83ee')) {function content_55f6a4cfb83ee($_smarty_tpl) {?><a href="" class="head_title">Bài viết nổi bật</a>
<ul class="blog-list-left">
  <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['row']->key;
?>
  <li class="item-bl"> <img src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
upload/news/thumb/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['row']->value['photo'])===null||$tmp==='' ? 'no-img.jpg' : $tmp);?>
" width="70" style="float: left; margin-right: 10px">
  <div class="info-blog-w"> <a class="blog-title-link" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['row']->value['pre_link'];?>
-<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
.html"><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</a> </div>
  </li>
  <?php } ?>
</ul><?php }} ?>