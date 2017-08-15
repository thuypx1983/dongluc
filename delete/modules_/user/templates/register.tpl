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
	width:450px;
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
				<a href="{$url}dang-ky/">Đăng ký thật nhanh chóng trên {$alias}</a>
			</div>
			
			<div style="border-bottom:1px solid #E6E6E6; margin-bottom:20px; position:relative; padding-bottom:4px;">
				<h1 style="margin:0; padding:0; font-size:12px;">Đăng ký</h1>
				<span style="position:absolute; right:0; top:0; color:#c00;">(*) là bắt buộc phải nhập</span>
			</div>
			
			{if $msg_success!=''}
				<div class="input_success">
					{$msg_success}
				</div>
			{elseif $msg_error!=''}	
				<div class="input_error">
					 {$msg_error}
				</div>
			{/if}
			
			<form method="post">
			
				<div class="control-group">
					<label class="control-label">Email <span class="notice">(*)</span></label>
					<div class="controls">
						<input type="text" placeholder="Email" class="validate_required" name="email" value="{$smarty.post.email}">
						<div class="email_error validate_error">Bạn chưa nhập Email</div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="control-group">
					<label class="control-label">Mật khẩu <span class="notice">(*)</span></label>
					<div class="controls">
						<input type="password" class="validate_required" placeholder="Password" name="password">
						<div class="password_error validate_error">Bạn chưa nhập mật khẩu</div>
					</div>
					<div class="clear"></div>
				</div>
				
				<div class="control-group">
					<label class="control-label">Nhập lại mật khẩu</label>
					<div class="controls">
						<input autocomplete="off" type="password" name="confirm_password" placeholder="Nhập lại password" class="validate_equal" equal-to="password"  />
						<div class="confirm_password_error validate_error">Nhập lại mật khẩu không đúng</div>
					</div>
					<div class="clear"></div>
				</div>
				
				<div class="control-group">
					<label class="control-label" >Họ tên đầy đủ <span class="notice">(*)</span></label>
					<div class="controls">
						<input type="text"  placeholder="Tên đầy đủ" class="validate_required" name="fullname" value="{$smarty.post.fullname}">
						<div class="fullname_error validate_error">Bạn chưa nhập họ và tên</div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="control-group">
					<label class="control-label">Số điện thoại <span class="notice">(*)</span></label>
					<div class="controls">
						<input type="text"  placeholder="Số điện thoại" class="validate_required validate_number" name="phone" value="{$smarty.post.phone}">
						<div class="phone_error validate_error">Bạn chưa nhập số điện thoại</div>
						<div class="phone_number_error validate_error">Điện thoại phải là số</div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="control-group">
					<label class="control-label">Địa chỉ <span class="notice">(*)</span></label>
					<div class="controls">
						<textarea cols="3" class="validate_required" name="address" placeholder="Địa chỉ liên lạc và chuyển hàng">{$smarty.post.address}</textarea>
						<div class="address_error validate_error">Bạn chưa nhập địa chỉ</div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="control-group">
					<label class="control-label">Mã bảo mật <span class="notice">(*)</span></label>
					<div class="controls">
						<img src="{$url}lib/captcha/captcha.class.php" style="border:1px solid #CECECE; float:left; margin-top:2px; margin-right:10px; height:23px;" id="imgCaptcha">
						<input type="text" name="captcha" class="validate_required" id="captcha" style="float:left; width:112px;" />
						<div class="captcha_error validate_error">Vui lòng nhập mã bảo mật</div>	
					</div>
					<div class="clear"></div>
				</div>
				
				<div class="control-group">
					<div class="controls">
						<button type="submit" class="btn validate_form" name="dangky">Hoàn tất đăng ký</button>
					</div>
					<div class="clear"></div>
				</div>
			</form>
			
			<div style="font-size:11px; color:#333;">
				(*) Bạn đã có tài khoản tại {$alias}&nbsp;<a href="{$url}dang-nhap/" style="color:#f00; text-decoration:underline;" title="Đăng nhập">Đăng nhập ngay</a>
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
		  
		  