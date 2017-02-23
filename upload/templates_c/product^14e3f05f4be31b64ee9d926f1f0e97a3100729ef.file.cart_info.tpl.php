<?php /* Smarty version Smarty-3.1.7, created on 2017-02-22 09:49:31
         compiled from "modules/product/templates/cart_info.tpl" */ ?>
<?php /*%%SmartyHeaderCode:111021013155f6773744b090-03531423%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '14e3f05f4be31b64ee9d926f1f0e97a3100729ef' => 
    array (
      0 => 'modules/product/templates/cart_info.tpl',
      1 => 1431934266,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '111021013155f6773744b090-03531423',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_55f6773748174',
  'variables' => 
  array (
    'url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55f6773748174')) {function content_55f6773748174($_smarty_tpl) {?>
<?php if (!$_SESSION['user']){?>
<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
dang-nhap.html" class="link_login">Đăng nhập</a>
<?php }else{ ?>
<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
thong-tin-ca-nhan.html" class="link_login">Thông tin cá nhân</a>
<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
don-hang.html" class="link_login">Đơn hàng của tôi</a>
<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
?mod=user&task=logout" class="link_login">Đăng xuất</a>
<?php }?>

<?php if ($_SESSION['cart']){?>
<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
gio-hang.html" class="">
	<div class="show_cart fr"><span>Giỏ hàng <?php echo count($_SESSION['cart']);?>
</span></div>
</a>
<?php }?><?php }} ?>