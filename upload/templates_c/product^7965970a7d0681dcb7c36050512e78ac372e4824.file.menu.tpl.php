<?php /* Smarty version Smarty-3.1.7, created on 2017-02-22 09:49:31
         compiled from "modules/product/templates/menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:170287699055f67737599579-71596013%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7965970a7d0681dcb7c36050512e78ac372e4824' => 
    array (
      0 => 'modules/product/templates/menu.tpl',
      1 => 1475753234,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '170287699055f67737599579-71596013',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_55f6773767aa2',
  'variables' => 
  array (
    'url' => 0,
    'rows' => 0,
    'row' => 0,
    'r' => 0,
    'endsub' => 0,
    'region' => 0,
    're' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55f6773767aa2')) {function content_55f6773767aa2($_smarty_tpl) {?><div class=" menu_main">
          <ul>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
" <?php if ($_GET['mod']==''){?>class="active"<?php }?>>Trang chủ</a></li>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
gioi-thieu/" <?php if ($_GET['mod']=='about'){?>class="active"<?php }?>>Giới thiệu</a> </li>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
san-pham/" <?php if ($_GET['mod']=='product'){?>class="active"<?php }?>>Sản phẩm</a>
            <?php if ($_smarty_tpl->tpl_vars['rows']->value){?>
              <ul class="sub_menu_main 1">
                <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['row']->key;
?>
                <li><a href="<?php if ($_smarty_tpl->tpl_vars['row']->value['link_to']!=''){?><?php echo $_smarty_tpl->tpl_vars['row']->value['link_to'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['row']->value['link'];?>
-<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
/<?php }?>"><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</a>
                    <?php if ($_smarty_tpl->tpl_vars['row']->value['sub']){?>
                  <ul class="sub_menu_main2">
                        <?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['row']->value['sub']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value){
$_smarty_tpl->tpl_vars['r']->_loop = true;
?>
                        <li><a href="<?php if ($_smarty_tpl->tpl_vars['r']->value['link_to']!=''){?><?php echo $_smarty_tpl->tpl_vars['r']->value['link_to'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['r']->value['link'];?>
-<?php echo $_smarty_tpl->tpl_vars['r']->value['id'];?>
/<?php }?>"><?php echo $_smarty_tpl->tpl_vars['r']->value['title'];?>
</a>
                            <?php if ($_smarty_tpl->tpl_vars['r']->value['sub']){?>
                              <ul class="sub_menu_main3">
                                    <?php  $_smarty_tpl->tpl_vars['endsub'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['endsub']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['r']->value['sub']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['endsub']->key => $_smarty_tpl->tpl_vars['endsub']->value){
$_smarty_tpl->tpl_vars['endsub']->_loop = true;
?>
                                    <li><a href="<?php if ($_smarty_tpl->tpl_vars['endsub']->value['link_to']!=''){?><?php echo $_smarty_tpl->tpl_vars['endsub']->value['link_to'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['endsub']->value['link'];?>
-<?php echo $_smarty_tpl->tpl_vars['endsub']->value['id'];?>
/<?php }?>"><?php echo $_smarty_tpl->tpl_vars['endsub']->value['title'];?>
</a></li>
                                    <?php } ?>
                              </ul>
                              <?php }?>
                        </li>
                        <?php } ?>
                  </ul>
                  <?php }?>
                </li>
                <?php } ?>
                </ul>
            <?php }?>
                
            </li>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
dich-vu/" <?php if ($_GET['mod']=='news'){?>class="active"<?php }?>>Dịch vụ</a></li>
            <li>
                <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
showroom/" <?php if ($_GET['mod']=='showroom'){?>class="active"<?php }?>>Showroom</a>
                <?php if ($_smarty_tpl->tpl_vars['region']->value){?>
                <ul class="sub_menu">
                    <?php  $_smarty_tpl->tpl_vars['re'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['re']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['region']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['re']->key => $_smarty_tpl->tpl_vars['re']->value){
$_smarty_tpl->tpl_vars['re']->_loop = true;
?>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
showroom/<?php echo $_smarty_tpl->tpl_vars['re']->value['link'];?>
-<?php echo $_smarty_tpl->tpl_vars['re']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['re']->value['title'];?>
</a></li>
                    <?php } ?>
                </ul>
                <?php }?>
            </li>
            <!-- <li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
doi-tac/"  <?php if ($_GET['mod']=='partner'){?>class="active"<?php }?>>Đối tác</a></li> -->
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
lien-he.html"  <?php if ($_GET['mod']=='contact'){?>class="active"<?php }?>>Liên hệ</a></li>
          </ul>
        </div><?php }} ?>