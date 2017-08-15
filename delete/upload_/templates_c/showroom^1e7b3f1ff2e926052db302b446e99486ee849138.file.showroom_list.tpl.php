<?php /* Smarty version Smarty-3.1.7, created on 2015-05-11 17:55:52
         compiled from "modules/showroom/templates/showroom_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:164070807655508ab8705788-52863437%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1e7b3f1ff2e926052db302b446e99486ee849138' => 
    array (
      0 => 'modules/showroom/templates/showroom_list.tpl',
      1 => 1431057671,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '164070807655508ab8705788-52863437',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'url' => 0,
    'region' => 0,
    'rows' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_55508ab877643',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55508ab877643')) {function content_55508ab877643($_smarty_tpl) {?><div class="grid1060">
    <div class="content_cate"> <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
showroom/" class="head_title">Showroom <?php echo $_smarty_tpl->tpl_vars['region']->value['title'];?>
</a>
      <div class="pkg">
        <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
        <div class="box_showroom pkg">

          <div class="img_showroom fl"> <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['row']->value['pre_link'];?>
-<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
.html"><img  src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
upload/showroom/thumb/<?php echo $_smarty_tpl->tpl_vars['row']->value['thumb'];?>
" style="max-width:100%"/> </a></div>
          <div class="info_showroom fl info_company">
           
            <ul>
              <li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['row']->value['pre_link'];?>
-<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
.html" class="f26"><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</a></li>
              <li class="address"><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</li>
              <li class="email">Email: <?php echo $_smarty_tpl->tpl_vars['row']->value['email'];?>
</li>
              <li class="phone">Hotline: <?php echo $_smarty_tpl->tpl_vars['row']->value['hotline'];?>
</li>
            </ul>
          </div>
           </div>
        <?php }
if (!$_smarty_tpl->tpl_vars['row']->_loop) {
?>
            <div style="margin-left:0px; padding:10px 0 20px;">
                <em><p>Chưa cập nhật nội dung</p></em>
            </div>
        <?php } ?>
      </div>
    </div>
  </div><?php }} ?>