<?php /* Smarty version Smarty-3.1.7, created on 2015-05-11 17:55:21
         compiled from "modules/layout/templates/default.tpl" */ ?>
<?php /*%%SmartyHeaderCode:180668905055508a99115ce6-59427025%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2f886d44a1429615247c5beca7013ef6c68fef7c' => 
    array (
      0 => 'modules/layout/templates/default.tpl',
      1 => 1430982002,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '180668905055508a99115ce6-59427025',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_55508a991760c',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55508a991760c')) {function content_55508a991760c($_smarty_tpl) {?><?php if (!is_callable('smarty_function_loadModule')) include '/var/www/textlink/beta/dongluc/lib/Smarty/plugins/function.loadModule.php';
?><?php echo smarty_function_loadModule(array('mod'=>'header'),$_smarty_tpl);?>

<?php if ($_GET['mod']!=''){?>
	<?php echo smarty_function_loadModule(array('mod'=>$_GET['mod'],'task'=>$_GET['task']),$_smarty_tpl);?>

<?php }else{ ?>
	<?php echo smarty_function_loadModule(array('mod'=>'home'),$_smarty_tpl);?>

<?php }?>
<?php echo smarty_function_loadModule(array('mod'=>'footer'),$_smarty_tpl);?>
<?php }} ?>