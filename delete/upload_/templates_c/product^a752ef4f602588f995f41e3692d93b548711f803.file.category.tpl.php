<?php /* Smarty version Smarty-3.1.7, created on 2015-05-11 17:55:58
         compiled from "modules/product/templates/category.tpl" */ ?>
<?php /*%%SmartyHeaderCode:115504123255508abe4c2324-66407297%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a752ef4f602588f995f41e3692d93b548711f803' => 
    array (
      0 => 'modules/product/templates/category.tpl',
      1 => 1431338381,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '115504123255508abe4c2324-66407297',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'url' => 0,
    'rows' => 0,
    'menu_select' => 0,
    'row' => 0,
    'r' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_55508abe544cf',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55508abe544cf')) {function content_55508abe544cf($_smarty_tpl) {?><script src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
js/main.js" type="text/javascript"></script>

<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
san-pham/" class="head_title">Danh mục sản phẩm</a>
        <div id='cssmenu'>

        <ul>
        	<?php if ($_GET['mod']=='product'){?><?php $_smarty_tpl->tpl_vars['menu_select'] = new Smarty_variable($_GET['id'], null, 0);?><?php }?>
	    	<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['row']->key;
?>
	    		<li <?php if (in_array($_smarty_tpl->tpl_vars['menu_select']->value,$_smarty_tpl->tpl_vars['row']->value['sub_ids'])||$_smarty_tpl->tpl_vars['menu_select']->value==$_smarty_tpl->tpl_vars['row']->value['id']){?>class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['row']->value['link'];?>
-<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
/"><span><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</span><i></i></a>
    				<?php if ($_smarty_tpl->tpl_vars['row']->value['sub']){?>
		            <!-- <ul style="display:block"> -->
                    <ul<?php if (in_array($_smarty_tpl->tpl_vars['menu_select']->value,$_smarty_tpl->tpl_vars['row']->value['sub_ids'])||$_smarty_tpl->tpl_vars['menu_select']->value==$_smarty_tpl->tpl_vars['row']->value['id']){?> style="display:block"<?php }?>>
		            	<?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['row']->value['sub']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value){
$_smarty_tpl->tpl_vars['r']->_loop = true;
?>
		                <li <?php if ($_smarty_tpl->tpl_vars['menu_select']->value==$_smarty_tpl->tpl_vars['r']->value['id']){?>class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['r']->value['link'];?>
-<?php echo $_smarty_tpl->tpl_vars['r']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['r']->value['title'];?>
</a></li>
		                <?php } ?>
		            </ul>
		            <?php }?>
	    		</li>
	    	<?php } ?>
         </ul>
          <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
san-pham/" class="view_all_cate">Xem toàn bộ</a> </div>

<?php }} ?>