<?php /* Smarty version Smarty-3.1.7, created on 2017-02-22 09:49:31
         compiled from "modules/home/templates/home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:187773380855f67746300694-00228244%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c071cb85b066ec4ea2832ab70a6d48999db05548' => 
    array (
      0 => 'modules/home/templates/home.tpl',
      1 => 1432713998,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '187773380855f67746300694-00228244',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_55f677463446f',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55f677463446f')) {function content_55f677463446f($_smarty_tpl) {?><?php if (!is_callable('smarty_function_loadModule')) include '/home/dongluc_dev_oms_vn/public_html/lib/Smarty/plugins/function.loadModule.php';
?><!-- <div class="grid1060"> -->
<?php echo smarty_function_loadModule(array('mod'=>'ads','task'=>'home'),$_smarty_tpl);?>

<div class="grid94p">

    <div class="content_home pkg">
      <ul class="list_banner_home">

        <?php echo smarty_function_loadModule(array('mod'=>'ads','task'=>'banner_small'),$_smarty_tpl);?>


      </ul>
    </div>
 </div>
<?php echo smarty_function_loadModule(array('mod'=>'ads','task'=>'banner_big'),$_smarty_tpl);?>

<div class="grid1060">
<?php echo smarty_function_loadModule(array('mod'=>'product','task'=>'list_top_home'),$_smarty_tpl);?>

</div><?php }} ?>