<?php /* Smarty version Smarty-3.1.7, created on 2015-05-11 17:55:21
         compiled from "modules/home/templates/home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:192824246255508a99377b35-13097497%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c071cb85b066ec4ea2832ab70a6d48999db05548' => 
    array (
      0 => 'modules/home/templates/home.tpl',
      1 => 1431155305,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '192824246255508a99377b35-13097497',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_55508a993911b',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55508a993911b')) {function content_55508a993911b($_smarty_tpl) {?><?php if (!is_callable('smarty_function_loadModule')) include '/var/www/textlink/beta/dongluc/lib/Smarty/plugins/function.loadModule.php';
?><div class="grid1060">

    <?php echo smarty_function_loadModule(array('mod'=>'ads','task'=>'home'),$_smarty_tpl);?>


    <div class="content_home pkg">
      <ul class="list_banner_home">

        <?php echo smarty_function_loadModule(array('mod'=>'ads','task'=>'banner_small'),$_smarty_tpl);?>


        <li class="box_video_home">
          <div class="head_video">Video</div>
          <a href=""><span class="icon_play"><img src="images/icon_youtube.png"/> </span><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
photo/s3.jpg"/> </a></li>
      </ul>
    </div>
    <?php echo smarty_function_loadModule(array('mod'=>'ads','task'=>'banner_big'),$_smarty_tpl);?>

    <?php echo smarty_function_loadModule(array('mod'=>'product','task'=>'list_top_home'),$_smarty_tpl);?>


    
  </div>

  <?php }} ?>