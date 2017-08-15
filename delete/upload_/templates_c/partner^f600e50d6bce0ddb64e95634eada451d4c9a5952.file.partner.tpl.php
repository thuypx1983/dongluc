<?php /* Smarty version Smarty-3.1.7, created on 2015-05-11 17:55:44
         compiled from "modules/partner/templates/partner.tpl" */ ?>
<?php /*%%SmartyHeaderCode:24560057955508ab052c5e3-60361998%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f600e50d6bce0ddb64e95634eada451d4c9a5952' => 
    array (
      0 => 'modules/partner/templates/partner.tpl',
      1 => 1431068835,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24560057955508ab052c5e3-60361998',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'url' => 0,
    'rows' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_55508ab057092',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55508ab057092')) {function content_55508ab057092($_smarty_tpl) {?><div class="grid1060">
    <div class="content_cate"> <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
doi-tac/" class="head_title">Đối tác</a>
      <div class="pkg">
        <?php if ($_smarty_tpl->tpl_vars['rows']->value){?>
        <ul class="list_partern">
            <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
                <li><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
upload/partner/thumb/<?php echo $_smarty_tpl->tpl_vars['row']->value['thumb'];?>
"/> </li>
            <?php } ?>
        </ul>
        <?php }else{ ?>
        <div style="margin-left:0px; padding:10px 0 20px;">
            <em><p>Chưa cập nhật nội dung</p></em>
        </div>
        <?php }?>
      </div>
    </div>
  </div><?php }} ?>