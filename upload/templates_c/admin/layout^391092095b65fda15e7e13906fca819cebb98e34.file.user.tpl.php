<?php /* Smarty version Smarty-3.1.7, created on 2015-09-14 14:25:35
         compiled from "admin/modules/layout/templates/user.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8069196355f6766fc48822-39502176%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '391092095b65fda15e7e13906fca819cebb98e34' => 
    array (
      0 => 'admin/modules/layout/templates/user.tpl',
      1 => 1397451068,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8069196355f6766fc48822-39502176',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_55f6766fc90fb',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55f6766fc90fb')) {function content_55f6766fc90fb($_smarty_tpl) {?><?php if (!is_callable('smarty_function_loadModule')) include '/home/dongluc/public_html/lib/Smarty/plugins/function.loadModule.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Đăng nhập hệ thống quản trị</title>
<meta name="description" content="Administrator Control Panel" />
<script type="text/javascript">	var url= "<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
"; </script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
lib/jquery/jquery.js"></script>
<link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
favicon.ico" />

<style type="text/css">
body{
	font-family:Arial, Helvetica, sans-serif;
	background-color:#fff;
	margin:0px;
	background-position:center top;
	background-repeat:no-repeat;
	font-size:12px;
	color:white;
	height:100%;
	width:100%;
	text-align:left;	
}
</style>

</head>

<body>
<?php echo smarty_function_loadModule(array('mod'=>'user','task'=>$_GET['task']),$_smarty_tpl);?>



</body>
</html><?php }} ?>