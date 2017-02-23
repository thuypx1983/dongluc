<?php /* Smarty version Smarty-3.1.7, created on 2015-10-11 08:54:25
         compiled from "modules/user/templates/active.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15973006595619c1519faf95-02582112%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1554eb0f3f7beba7fcf34b137e378371699a27aa' => 
    array (
      0 => 'modules/user/templates/active.tpl',
      1 => 1431909066,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15973006595619c1519faf95-02582112',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'msg_success' => 0,
    'url' => 0,
    'msg_error' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5619c151b17a8',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5619c151b17a8')) {function content_5619c151b17a8($_smarty_tpl) {?><style type="text/css">
.red { color:red; }
.green { color:green; }
</style>
<div class="grid1060">
    <div class="content_cate">
      <div class="pkg">
        <div class="col30per fl collog"> <a href="" class="head_title">Chức năng</a>
			<div class="f16gray">Vui lòng kích hoạt tài khoản</div>
		 </div>
        <div class="col70per fr collog"> <a href="" class="head_title">Kích hoạt tài khoản</a>
          
		  <?php if ($_smarty_tpl->tpl_vars['msg_success']->value!=''){?>
				<p class="green"><?php echo $_smarty_tpl->tpl_vars['msg_success']->value;?>
</p>
				<div style="height:12px;"></div>
				<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
dang-nhap.html"class="btn">Đăng nhập ngay</a>
			<?php }elseif($_smarty_tpl->tpl_vars['msg_error']->value!=''){?>	
				<p class="red">Rất tiếc! <?php echo $_smarty_tpl->tpl_vars['msg_error']->value;?>
</p>
			<?php }?>
		  
        </div>
      </div>
    </div>
  </div>

<!--

<style type="text/css">
.red { color:red; }
.green { color:green; }
</style>

<div class="row">
	<div class="float-left" style="width:690px;">
		
		<div class="box margin-20 padding-10" style="padding-bottom:20px;">
			<h4 class="box-title">Kích hoạt tài khoản</h4>
			<?php if ($_smarty_tpl->tpl_vars['msg_success']->value!=''){?>
				<p class="green"><?php echo $_smarty_tpl->tpl_vars['msg_success']->value;?>
</p>
				<div style="height:12px;"></div>
				<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
dang-nhap/"class="btn">đăng nhập ngay</a>
			<?php }elseif($_smarty_tpl->tpl_vars['msg_error']->value!=''){?>	
				<p class="red">Rất tiếc! <?php echo $_smarty_tpl->tpl_vars['msg_error']->value;?>
</p>
			<?php }?>
			
		</div>
		
	</div>
	
	<div class="float-right" style="width:288px;">	
	
		<div class="box margin-20" style="padding:10px 0;">
			<?php echo $_smarty_tpl->getSubTemplate ('support.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		</div>
		
	</div>
	
	<div class="clear"></div>
	
</div>

-->


<?php }} ?>