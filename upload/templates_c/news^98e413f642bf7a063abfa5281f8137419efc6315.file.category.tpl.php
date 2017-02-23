<?php /* Smarty version Smarty-3.1.7, created on 2017-02-22 10:05:49
         compiled from "modules/news/templates/category.tpl" */ ?>
<?php /*%%SmartyHeaderCode:200330000955f6a4cfa8ab86-32860423%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '98e413f642bf7a063abfa5281f8137419efc6315' => 
    array (
      0 => 'modules/news/templates/category.tpl',
      1 => 1432809494,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '200330000955f6a4cfa8ab86-32860423',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_55f6a4cfb5014',
  'variables' => 
  array (
    'url' => 0,
    'rows' => 0,
    'menu_select' => 0,
    'row' => 0,
    'r' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55f6a4cfb5014')) {function content_55f6a4cfb5014($_smarty_tpl) {?><script src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
js/main.js" type="text/javascript"></script>

<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
dich-vu/" class="head_title">Danh mục</a>
<div id='cssmenu'>

<ul>
	<?php if ($_GET['mod']=='news'){?><?php $_smarty_tpl->tpl_vars['menu_select'] = new Smarty_variable($_GET['id'], null, 0);?><?php }?>
	<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['row']->key;
?>
		<li <?php if (in_array($_smarty_tpl->tpl_vars['menu_select']->value,$_smarty_tpl->tpl_vars['row']->value['sub_ids'])||$_smarty_tpl->tpl_vars['menu_select']->value==$_smarty_tpl->tpl_vars['row']->value['id']){?>class="active"<?php }?>><a href="<?php if ($_smarty_tpl->tpl_vars['row']->value['link_to']!=''){?><?php echo $_smarty_tpl->tpl_vars['row']->value['link_to'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['row']->value['pre_link'];?>
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
                <li <?php if ($_smarty_tpl->tpl_vars['menu_select']->value==$_smarty_tpl->tpl_vars['r']->value['id']){?>class="active"<?php }?>><a href="<?php if ($_smarty_tpl->tpl_vars['r']->value['link_to']!=''){?><?php echo $_smarty_tpl->tpl_vars['r']->value['link_to'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['r']->value['pre_link'];?>
-<?php echo $_smarty_tpl->tpl_vars['r']->value['id'];?>
/<?php }?>"><?php echo $_smarty_tpl->tpl_vars['r']->value['title'];?>
</a></li>
                <?php } ?>
            </ul>
            <?php }?>
		</li>
	<?php } ?>
 </ul>
</div>

<?php }} ?>