
{literal}
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
{/literal}


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

<script type="text/javascript" src="{$url}js/validate.js"></script>

<div class="row">
	<div class="float-left" style="width:690px;">
		
		<div class="box margin-20 padding-10" style="padding-bottom:20px;">
		
			<div id="rootpath" style="margin:10px 0 20px;">
				<a href="{$url}" class="rt_home" title="Trang chủ"></a>
				<span></span>
				<a href="{$url}dang-nhap/" title="Đăng ký tài khoản trên {$alias}">Đăng nhập</a>
			</div>
			
			<div style="border-bottom:1px solid #E6E6E6; margin-bottom:20px; position:relative; padding-bottom:4px;">
				<h1 style="margin:0; padding:0; font-size:12px;">Đăng nhập</h1>
			</div>
			
			{if $msg_success!=''}
				<div class="input_success">
					{$msg_success}
				</div>
				{if count($smarty.session.cart)>0 }	
					{redirect url=$url|cat:"thanh-toan/" time=1}
				{else}
					{redirect url=$url time=1}	
				{/if}	
			{elseif $msg_error!=''}	
				<div class="input_error">
					 {$msg_error}
				</div>
			{/if}
			
			
			<form method="post">
			
			<div class="control-group">
				<label class="control-label">Email</label>
				<div class="controls">
					<input type="text" class="validate_required" name="tex_email" value="{$smarty.post.tex_email}">
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
				(*) Bạn chưa có tài khoản tại {$alias}&nbsp;<a href="{$url}dang-ky/" style="color:#f00; text-decoration:underline;" title="Đăng ký">Đăng ký ngay</a>
				<!--<a href="#">Bạn quên mật khẩu ?</a>-->
			</div>
			
		</div>
		
	</div>
	
	<div class="float-right" style="width:288px;">	
	
		<div class="box margin-20" style="padding:10px 0;">
			{include file='support.tpl'}
		</div>
		
	</div>
	
	<div class="clear"></div>
	
</div>
		  
		  				