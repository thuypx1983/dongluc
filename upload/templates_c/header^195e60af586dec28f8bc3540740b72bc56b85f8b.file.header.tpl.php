<?php /* Smarty version Smarty-3.1.7, created on 2017-02-22 09:49:31
         compiled from "modules/header/templates/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:162656693455f677373a8ec8-92400563%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '195e60af586dec28f8bc3540740b72bc56b85f8b' => 
    array (
      0 => 'modules/header/templates/header.tpl',
      1 => 1469099100,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '162656693455f677373a8ec8-92400563',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_55f6773740b0d',
  'variables' => 
  array (
    'url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55f6773740b0d')) {function content_55f6773740b0d($_smarty_tpl) {?><?php if (!is_callable('smarty_function_getPageinfo')) include '/home/dongluc_dev_oms_vn/public_html/lib/Smarty/plugins/function.getPageinfo.php';
if (!is_callable('smarty_function_loadModule')) include '/home/dongluc_dev_oms_vn/public_html/lib/Smarty/plugins/function.loadModule.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="content-language" content="vi" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
images/photo.png" />
<link type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
css/dongluc.css" rel="stylesheet">
<link type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
css/jquery.bxslider.css" rel="stylesheet">
<link type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
css/custom.css" rel="stylesheet">

<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
js/jquery.bxslider.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
js/jquery.sticky.js" type="text/javascript"></script>
<script type="text/javascript"> var url = "<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
"; </script>
<?php echo smarty_function_getPageinfo(array(),$_smarty_tpl);?>


<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/578f06ef3ef5055126156de1/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

</head>

<body>
    <div class="close_menu"></div>
<div id='cssmenu1' class="menu_left_mobile">
<div class="pkg login_mobile" >

<div class="login_cart pkg">
    <?php echo smarty_function_loadModule(array('mod'=>'product','task'=>'cart_info'),$_smarty_tpl);?>

</div>
    
</div>
  <?php echo smarty_function_loadModule(array('mod'=>'product','task'=>'category','param'=>'responsive'),$_smarty_tpl);?>

</div>
<div class="menu_show">
    <?php echo smarty_function_loadModule(array('mod'=>'product','task'=>'search'),$_smarty_tpl);?>

    <?php echo smarty_function_loadModule(array('mod'=>'product','task'=>'menu_responsive'),$_smarty_tpl);?>

  
</div>
<div class="wrapper">
  <script type="text/javascript">
  $(function(){
    $(window).load(function(){
      $("#header").sticky({ topSpacing: 0 });
    });
  })
  </script>
  <div class="header pkg" id="header">
    <div class="grid1060">
      <div class="pkg">

        <div class="menu_drop_mobile" ><a href="javascript:;" class="fl more_menu"><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
images/cart_menu.png"/> </a></div>


        <div class="logo fl"><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
images/photo.png"/> </a></div>
        <a href="javascript:;" class="btn_menu fr"></a>
        <?php echo smarty_function_loadModule(array('mod'=>'product','task'=>'menu'),$_smarty_tpl);?>

        
        <div class="login_cart">
        <?php echo smarty_function_loadModule(array('mod'=>'product','task'=>'cart_info'),$_smarty_tpl);?>

        </div>
        
        <?php echo smarty_function_loadModule(array('mod'=>'product','task'=>'search'),$_smarty_tpl);?>

      </div>
    </div>
  </div>
  <div class="block50"></div>
  
  <?php }} ?>