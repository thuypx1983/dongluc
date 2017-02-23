<?php /* Smarty version Smarty-3.1.7, created on 2015-10-11 08:54:25
         compiled from "modules/user/templates/support.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14287980455619c151b27605-07621910%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0bad042ea243ae70da94498f31c314922b4f66f6' => 
    array (
      0 => 'modules/user/templates/support.tpl',
      1 => 1389081612,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14287980455619c151b27605-07621910',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'url' => 0,
    'alias' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5619c151b4657',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5619c151b4657')) {function content_5619c151b4657($_smarty_tpl) {?><div style="text-align:center;">
	<h4 class="box-title">HỖ TRỢ TRỰC TUYẾN</h4>
	
	<h4 style="text-align: center; font-size: 26px; color: green; font-family: Arial;">Hotline :  <?php echo $_smarty_tpl->getConfigVariable('phone_contact');?>
</h4>
	
	<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
livehelp/client.php?locale=vn" target="_blank" onclick="if(navigator.userAgent.toLowerCase().indexOf('opera') != -1 &amp;&amp; window.event.preventDefault) window.event.preventDefault();this.newWindow = window.open('<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
livehelp/client.php?locale=vn&amp;url='+escape(document.location.href)+'&amp;referrer='+escape(document.referrer), 'webim', 'toolbar=0,scrollbars=0,location=0,status=1,menubar=0,width=640,height=480,resizable=1');this.newWindow.focus();this.newWindow.opener=window;return false;">
		<div style="border:3px dashed #fe3f01; padding:10px;margin:auto; width:220px; text-align:center; color:#fe3f01; font-size:14px; font-weight:bold; margin-bottom:20px;">
			<img src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
images/live_chat.png" />
			<p>Click để chat ngay với <?php echo $_smarty_tpl->tpl_vars['alias']->value;?>
</p>
		</div>
	</a>
	
	
	
	<p>Thời gian làm việc : <?php echo $_smarty_tpl->getConfigVariable('lichlamviec');?>
</p>
	<p>Email hỗ trợ : <a href="#" title=""><?php echo $_smarty_tpl->getConfigVariable('email_contact');?>
</a></p>
</div><?php }} ?>