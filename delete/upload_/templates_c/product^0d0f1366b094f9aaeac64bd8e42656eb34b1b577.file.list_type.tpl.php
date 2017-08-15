<?php /* Smarty version Smarty-3.1.7, created on 2015-05-11 17:55:23
         compiled from "modules/product/templates/list_type.tpl" */ ?>
<?php /*%%SmartyHeaderCode:203052408155508a9b357fd5-08444126%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0d0f1366b094f9aaeac64bd8e42656eb34b1b577' => 
    array (
      0 => 'modules/product/templates/list_type.tpl',
      1 => 1431072063,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '203052408155508a9b357fd5-08444126',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'url' => 0,
    'rows' => 0,
    'root_link' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_55508a9b3fe61',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55508a9b3fe61')) {function content_55508a9b3fe61($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/var/www/textlink/beta/dongluc/lib/Smarty/plugins/modifier.truncate.php';
?>
<div class="grid1060">
    <div class="content_cate"> <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
san-pham/" class="head_title">Danh mục sản phẩm</a>
      <ul class="pkg list_menu_product">
        <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['row']->key;
?>
            <!-- <div class="news_bao">
                <h3><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['root_link']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['row']->value['parent_link'];?>
/<?php echo $_smarty_tpl->tpl_vars['row']->value['link'];?>
.html" title="<?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
">&#187;&nbsp;<?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</a></h3>
                <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['root_link']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['row']->value['parent_link'];?>
/<?php echo $_smarty_tpl->tpl_vars['row']->value['link'];?>
.html" title=""><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
upload/news/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['row']->value['photo'])===null||$tmp==='' ? '../../img_cust/default2.jpg' : $tmp);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['row']->value['seo_photo_alt'];?>
" /></a>
                <div><?php echo preg_replace('!<[^>]*?>!', ' ', smarty_modifier_truncate($_smarty_tpl->tpl_vars['row']->value['description'],400));?>
<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['root_link']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['row']->value['parent_link'];?>
/<?php echo $_smarty_tpl->tpl_vars['row']->value['link'];?>
.html" title="Xem tiếp">Xem tiếp</a></div>

            </div> -->
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['row']->value['link'];?>
-<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
/"><span class="name_cate"><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</span><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
upload/category/thumb/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['row']->value['thumb'])===null||$tmp==='' ? 'no-img.jpg' : $tmp);?>
"/> </a></li>
        <?php }
if (!$_smarty_tpl->tpl_vars['row']->_loop) {
?>
            <div style="margin-left:20px; padding:10px 0 20px;">
                <em><p>Chưa cập nhật nội dung</p></em>
            </div>
        <?php } ?>
      </ul>
    </div>
  </div><?php }} ?>