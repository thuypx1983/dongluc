<?php /* Smarty version Smarty-3.1.7, created on 2017-02-22 09:49:31
         compiled from "modules/layout/templates/default.tpl" */ ?>
<?php /*%%SmartyHeaderCode:107268234155f6773734bfe9-99417865%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2f886d44a1429615247c5beca7013ef6c68fef7c' => 
    array (
      0 => 'modules/layout/templates/default.tpl',
      1 => 1431007202,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '107268234155f6773734bfe9-99417865',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_55f677373a23d',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55f677373a23d')) {function content_55f677373a23d($_smarty_tpl) {?><?php if (!is_callable('smarty_function_loadModule')) include '/home/dongluc_dev_oms_vn/public_html/lib/Smarty/plugins/function.loadModule.php';
?><?php echo smarty_function_loadModule(array('mod'=>'header'),$_smarty_tpl);?>

<?php if ($_GET['mod']!=''){?>
	<?php echo smarty_function_loadModule(array('mod'=>$_GET['mod'],'task'=>$_GET['task']),$_smarty_tpl);?>

<?php }else{ ?>
	<?php echo smarty_function_loadModule(array('mod'=>'home'),$_smarty_tpl);?>

<?php }?>
<?php echo smarty_function_loadModule(array('mod'=>'footer'),$_smarty_tpl);?>
<?php }} ?>