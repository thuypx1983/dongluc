<?php /* Smarty version Smarty-3.1.7, created on 2015-05-11 17:55:58
         compiled from "modules/product/templates/filter.tpl" */ ?>
<?php /*%%SmartyHeaderCode:31474947155508abe54f247-52725279%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aa544b3823da44527b28567b72ebf3ba7d3fd802' => 
    array (
      0 => 'modules/product/templates/filter.tpl',
      1 => 1431304485,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31474947155508abe54f247-52725279',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'filter' => 0,
    'c' => 0,
    'k' => 0,
    's' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_55508abe5ae3f',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55508abe5ae3f')) {function content_55508abe5ae3f($_smarty_tpl) {?><a href="" class="head_title">lọc sản phẩm</a>
<ul class="list_filter">
  <li> <a class="head_filter" href="">Màu sắc</a>
    <ul class="sub_filter">
      <li class="filter_color">
        <?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['filter']->value['color']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
$_smarty_tpl->tpl_vars['c']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['c']->key;
?>
            <a href="" title="<?php echo $_smarty_tpl->tpl_vars['c']->value['title'];?>
" <?php if ($_smarty_tpl->tpl_vars['k']->value==0){?>class="active"<?php }?>><span style="background:<?php echo $_smarty_tpl->tpl_vars['c']->value['color_code'];?>
"></span></a>
        <?php } ?>
    </li>
    </ul>
  </li>
  <!--<li> <a class="head_filter" href="">Kích cỡ</a>
    <ul class="sub_filter">
        <ul class="list_size">
            <li>
                <?php  $_smarty_tpl->tpl_vars['s'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['s']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['filter']->value['size']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['s']->key => $_smarty_tpl->tpl_vars['s']->value){
$_smarty_tpl->tpl_vars['s']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['s']->key;
?>
                <a href="" <?php if ($_smarty_tpl->tpl_vars['k']->value==0){?>class="active"<?php }?>><?php echo $_smarty_tpl->tpl_vars['s']->value['title'];?>
</a>
                <?php } ?>
            </li>
          </ul>
    </ul>
    
  </li> -->
  <li> <a class="head_filter" href="">Giá</a>
    <ul class="sub_filter">
      <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['filter']->value['price']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['m']->key;
?>
        <li class="pkg <?php if ($_smarty_tpl->tpl_vars['k']->value==0){?>active<?php }?>">
            <input type="radio" name="r1" class="ck_price fl"/>
            <span class="fill_price fl"><?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</span>
        </li>
        <?php } ?>
    </ul>
  </li>
  <li> <a class="head_filter" href="">Chất liệu</a>
    <ul class="sub_filter">
        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['filter']->value['material']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['m']->key;
?>
        <li class="pkg <?php if ($_smarty_tpl->tpl_vars['k']->value==0){?>active<?php }?>">
            <input type="checkbox" class="ck_price fl"/>
            <span class="fill_price fl"><?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</span>
        </li>
        <?php } ?>
    </ul>
  </li>
</ul><?php }} ?>