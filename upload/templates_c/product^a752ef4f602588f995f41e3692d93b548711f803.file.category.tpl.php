<?php /* Smarty version Smarty-3.1.7, created on 2015-09-17 11:55:19
         compiled from "modules/product/templates/category.tpl" */ ?>
<?php /*%%SmartyHeaderCode:86965578355f6a4238748c4-71510601%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a752ef4f602588f995f41e3692d93b548711f803' => 
    array (
      0 => 'modules/product/templates/category.tpl',
      1 => 1442464301,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '86965578355f6a4238748c4-71510601',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_55f6a42394dc8',
  'variables' => 
  array (
    'url' => 0,
    'rows' => 0,
    'menu_select' => 0,
    'row' => 0,
    'r' => 0,
    'child_sub' => 0,
    'end_child' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55f6a42394dc8')) {function content_55f6a42394dc8($_smarty_tpl) {?><script src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
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
	    		<li <?php if (in_array($_smarty_tpl->tpl_vars['menu_select']->value,$_smarty_tpl->tpl_vars['row']->value['sub_ids'])||$_smarty_tpl->tpl_vars['menu_select']->value==$_smarty_tpl->tpl_vars['row']->value['id']){?>class="active"<?php }?>><a href="<?php if ($_smarty_tpl->tpl_vars['row']->value['link_to']!=''){?><?php echo $_smarty_tpl->tpl_vars['row']->value['link_to'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['row']->value['link'];?>
-<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
/<?php }?>"><span><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</span><i></i></a>
    				<?php if ($_smarty_tpl->tpl_vars['row']->value['sub']){?>
		            <!-- <ul style="display:block"> -->
                    <ul<?php if (in_array($_smarty_tpl->tpl_vars['menu_select']->value,$_smarty_tpl->tpl_vars['row']->value['sub_ids'])||$_smarty_tpl->tpl_vars['menu_select']->value==$_smarty_tpl->tpl_vars['row']->value['id']){?> style="display:block"<?php }?>>
		            	<?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['row']->value['sub']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value){
$_smarty_tpl->tpl_vars['r']->_loop = true;
?>
                        <li <?php if (in_array($_smarty_tpl->tpl_vars['menu_select']->value,$_smarty_tpl->tpl_vars['r']->value['sub_ids'])||$_smarty_tpl->tpl_vars['menu_select']->value==$_smarty_tpl->tpl_vars['r']->value['id']){?>class="active"<?php }?>><a href="<?php if ($_smarty_tpl->tpl_vars['r']->value['link_to']!=''){?><?php echo $_smarty_tpl->tpl_vars['r']->value['link_to'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['r']->value['link'];?>
-<?php echo $_smarty_tpl->tpl_vars['r']->value['id'];?>
/<?php }?>"><span><?php echo $_smarty_tpl->tpl_vars['r']->value['title'];?>
</span><?php if ($_smarty_tpl->tpl_vars['r']->value['sub']){?><i></i><?php }?></a>
                            <?php if ($_smarty_tpl->tpl_vars['r']->value['sub']){?>
                            <ul<?php if (in_array($_smarty_tpl->tpl_vars['menu_select']->value,$_smarty_tpl->tpl_vars['r']->value['sub_ids'])||$_smarty_tpl->tpl_vars['menu_select']->value==$_smarty_tpl->tpl_vars['r']->value['id']){?> style="display:block"<?php }?> class="sub_menu">
        		            	<?php  $_smarty_tpl->tpl_vars['child_sub'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['child_sub']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['r']->value['sub']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['child_sub']->key => $_smarty_tpl->tpl_vars['child_sub']->value){
$_smarty_tpl->tpl_vars['child_sub']->_loop = true;
?>
        		                 <li <?php if ($_smarty_tpl->tpl_vars['menu_select']->value==$_smarty_tpl->tpl_vars['child_sub']->value['id']){?>class="active"<?php }?>><a href="<?php if ($_smarty_tpl->tpl_vars['child_sub']->value['link_to']!=''){?><?php echo $_smarty_tpl->tpl_vars['child_sub']->value['link_to'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['child_sub']->value['link'];?>
-<?php echo $_smarty_tpl->tpl_vars['child_sub']->value['id'];?>
/<?php }?>"><?php echo $_smarty_tpl->tpl_vars['child_sub']->value['title'];?>
<?php if ($_smarty_tpl->tpl_vars['child_sub']->value['sub']){?><i></i><?php }?></a>
                                    <?php if ($_smarty_tpl->tpl_vars['child_sub']->value['sub']){?>
                                    <ul<?php if (in_array($_smarty_tpl->tpl_vars['menu_select']->value,$_smarty_tpl->tpl_vars['child_sub']->value['sub_ids'])||$_smarty_tpl->tpl_vars['menu_select']->value==$_smarty_tpl->tpl_vars['r']->value['id']){?> style="display:block"<?php }?> class="sub_menu">
                		            	<?php  $_smarty_tpl->tpl_vars['end_child'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['end_child']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['r']->value['sub']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['end_child']->key => $_smarty_tpl->tpl_vars['end_child']->value){
$_smarty_tpl->tpl_vars['end_child']->_loop = true;
?>
                		                <li <?php if ($_smarty_tpl->tpl_vars['menu_select']->value==$_smarty_tpl->tpl_vars['end_child']->value['id']){?>class="active"<?php }?>><a href="<?php if ($_smarty_tpl->tpl_vars['end_child']->value['link_to']!=''){?><?php echo $_smarty_tpl->tpl_vars['end_child']->value['link_to'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['end_child']->value['link'];?>
-<?php echo $_smarty_tpl->tpl_vars['end_child']->value['id'];?>
/<?php }?>"><?php echo $_smarty_tpl->tpl_vars['end_child']->value['title'];?>
<?php if ($_smarty_tpl->tpl_vars['end_child']->value['sub']){?><i></i><?php }?></a>
                                        
                                        </li>
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
	    	<?php } ?>
         </ul>
          <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
san-pham/" class="view_all_cate">Xem toàn bộ</a> </div>

<?php }} ?>