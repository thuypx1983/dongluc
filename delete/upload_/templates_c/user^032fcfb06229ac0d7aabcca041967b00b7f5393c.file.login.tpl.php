<?php /* Smarty version Smarty-3.1.7, created on 2015-05-14 00:53:37
         compiled from "modules/user/templates/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:50151461455538fa1ef8907-76891473%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '032fcfb06229ac0d7aabcca041967b00b7f5393c' => 
    array (
      0 => 'modules/user/templates/login.tpl',
      1 => 1382795530,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '50151461455538fa1ef8907-76891473',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'url' => 0,
    'alias' => 0,
    'msg_success' => 0,
    'msg_error' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_55538fa20617f',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55538fa20617f')) {function content_55538fa20617f($_smarty_tpl) {?><?php if (!is_callable('smarty_function_redirect')) include '/var/www/textlink/beta/dongluc/lib/Smarty/plugins/function.redirect.php';
?>

<script type="text/javascript">
$("document").ready(function (){

    /*$.get(url+'?mod=user&task=getcaptcha&ajax=true', function (result){
        $("#hid_keycapcha").val(result);
    });*/
    $('#imgCaptcha').click(function(){
        refreshImage(this);
    });
});

function refreshImage(obj){
    img_src = obj.src;
    obj.src = img_src + "?rand=1"+ Math.random();
    $.get(url+'?mod=user&task=getcaptcha&ajax=true', function (result){
        //$("#captcha").val(result);
    });
}
</script>



<style type="text/css">
.controls {
	float:right;
}
.control-label {
	float:left;
	margin-top:6px;
}
.control-group {
	margin:0 auto 10px;
	width:300px;
}
.control-group input[type="text"], .control-group input[type="password"] {
	border:1px solid #ccc;
	border-radius:4px;
	padding:4px;
	width:230px;
}
.control-group textarea {
	width:230px;
	max-width:230px;
	padding:4px;
	height:70px;
	border-radius:4px;
	border:1px solid #ccc;
}

</style>

<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
js/validate.js"></script>

<div class="row">
	<div class="float-left" style="width:690px;">
		
		<div class="box margin-20 padding-10" style="padding-bottom:20px;">
		
			<div id="rootpath" style="margin:10px 0 20px;">
				<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
" class="rt_home" title="Trang chủ"></a>
				<span></span>
				<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
dang-nhap/" title="Đăng ký tài khoản trên <?php echo $_smarty_tpl->tpl_vars['alias']->value;?>
">Đăng nhập</a>
			</div>
			
			<div style="border-bottom:1px solid #E6E6E6; margin-bottom:20px; position:relative; padding-bottom:4px;">
				<h1 style="margin:0; padding:0; font-size:12px;">Đăng nhập</h1>
			</div>
			
			<?php if ($_smarty_tpl->tpl_vars['msg_success']->value!=''){?>
				<div class="input_success">
					<?php echo $_smarty_tpl->tpl_vars['msg_success']->value;?>

				</div>
				<?php if (count($_SESSION['cart'])>0){?>	
					<?php echo smarty_function_redirect(array('url'=>($_smarty_tpl->tpl_vars['url']->value).("thanh-toan/"),'time'=>1),$_smarty_tpl);?>

				<?php }else{ ?>
					<?php echo smarty_function_redirect(array('url'=>$_smarty_tpl->tpl_vars['url']->value,'time'=>1),$_smarty_tpl);?>
	
				<?php }?>	
			<?php }elseif($_smarty_tpl->tpl_vars['msg_error']->value!=''){?>	
				<div class="input_error">
					 <?php echo $_smarty_tpl->tpl_vars['msg_error']->value;?>

				</div>
			<?php }?>
			
			
			<form method="post">
			
			<div class="control-group">
				<label class="control-label">Email</label>
				<div class="controls">
					<input type="text" class="validate_required" name="tex_email" value="<?php echo $_POST['tex_email'];?>
">
					<div class="tex_email_error validate_error">Bạn chưa nhập Email</div>
				</div>
				<div class="clear"></div>
			</div>
			
			<div class="control-group">
				<label class="control-label">Mật khẩu</label>
				<div class="controls">
					<input type="password" class="validate_required" name="tex_password">
					<div class="tex_password_error validate_error">Bạn chưa nhập mật khẩu</div>
				</div>
				<div class="clear"></div>
			</div>
			
			<div class="control-group">
				<div class="controls">
					<button type="submit" class="btn validate_form" name="dangnhap">Đăng nhập</button>
				</div>
				<div class="clear"></div>
			</div>
			
			<!--<div class="control-group">
			
			<div class="controls">
			<label class="checkbox">
			<input type="checkbox" name="remember_me"> Nhớ mật khẩu
			</label>
			</div>
			
			</div>-->
			</form>   
		  
			<div style="font-size:11px; color:#333;">
				(*) Bạn chưa có tài khoản tại <?php echo $_smarty_tpl->tpl_vars['alias']->value;?>
&nbsp;<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
dang-ky/" style="color:#f00; text-decoration:underline;" title="Đăng ký">Đăng ký ngay</a>
				<!--<a href="#">Bạn quên mật khẩu ?</a>-->
			</div>
			
		</div>
		
	</div>
	
	<div class="float-right" style="width:288px;">	
	
		<div class="box margin-20" style="padding:10px 0;">
			<?php echo $_smarty_tpl->getSubTemplate ('support.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		</div>
		
	</div>
	
	<div class="clear"></div>
	
</div>
		  
		  				<?php }} ?>