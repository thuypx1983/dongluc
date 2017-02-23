<?php /* Smarty version Smarty-3.1.7, created on 2015-05-11 17:55:21
         compiled from "modules/product/templates/cart_info.tpl" */ ?>
<?php /*%%SmartyHeaderCode:113312065855508a991d9c38-52407457%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '14e3f05f4be31b64ee9d926f1f0e97a3100729ef' => 
    array (
      0 => 'modules/product/templates/cart_info.tpl',
      1 => 1431333522,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '113312065855508a991d9c38-52407457',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_55508a991e753',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55508a991e753')) {function content_55508a991e753($_smarty_tpl) {?>
<?php if (!$_SESSION['user']){?>
<a href="" class="link_login">Đăng nhập</a>
<?php }else{ ?>
<a href="" class="link_login">Đăng xuất</a>
<div class="show_cart fr"><span>Giỏ hàng 10</span></div>
<?php }?>
<?php }} ?>