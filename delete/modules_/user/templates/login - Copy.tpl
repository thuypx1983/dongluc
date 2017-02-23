
<link rel="stylesheet" href="{$url}lib/jquery-ui-1.9.0.custom/themes/base/jquery.ui.all.css">
<style type="text/css">
#mainForm 
{
	line-height:18px;
}
#mainForm input[type="text"], [type="password"]
{
	width:358px;
	height:28px;
	margin:0;
	border:1px solid #C5C5C5;
	border-radius:4px;
	padding:0 5px;
	margin-bottom:10px;
	color:#666;
}
</style>
<script type="text/javascript">

$(function(){
	$('input[type="button"], [type="submit"]').button();
});

</script>

<div class="c-content">
	<div class="buttom-20">
		<h3 class="line-title">Đăng nhập</h3>
		
		{if $msg_success!=''}
			<p class="green">{$msg_success}</p>
			{if $msg!=''}
				{if $smarty.session.user.utype=='pub'}
					{redirect url='?mod=publisher&task=user&utask=update_profile' time=1}
				{else}
					{redirect url='?mod=advertiser&task=user&utask=update_profile' time=1}
				{/if}
				<script type="text/javascript">alert("{$msg}");</script>				
			{else}
				{if $smarty.session.user.utype=='pub'}
					{redirect url='?mod=publisher' time=1}
				{else}
					{redirect url='?mod=advertiser' time=1}
				{/if}
			{/if}
		{elseif $msg_error!=''}	
			<p class="red">{$msg_error}</p>
			<p class="red"><b>Mật khẩu của bạn đã lâu không được cập nhật, để đảm bảo bạn vẫn cập nhật mật khẩu thường xuyên vui lòng click vào "Quên mật khẩu" bên dưới để nhận mật khẩu mới được gửi trong email của bạn</b></p>
		{/if}
		
		{if $msg_success==''}
		
			{if $smarty.session.user}
			
					<p class="red">Bạn đã đăng nhập hệ thống, vui lòng chờ giây lát !</p>
					{if $smarty.session.user.utype=='pub'}
						{redirect url='?mod=publisher' time=1}
					{else}
						{redirect url='?mod=advertiser' time=1}
					{/if}
				
			{else}

			<form id="mainForm" class="form-horizontal animate" method="post" >
				<input name="tex_username" class="input-300 required" placeholder="Username" type="text" />
	  <br />
				<input name="tex_password" class="input-300 required" placeholder="Password" type="password" /><br />

				<button type="submit" name="submit" value="" class="submit">Đăng nhập</button>                       
				<span class="col_left">
					<input id="remember_me" name="remember_me" class="input-checkbox" type="checkbox">
					<label for="remember_me">Nhớ mật khẩu</label>
				</span><br />
				<span class="col_right">
					<label id="forgot_password"><a href="?mod=user&task=password" class="a_forgot_pass" style="text-decoration:none; color:#fff;">Quên mật khẩu?</a></label>
				</span>
				<br />
				<a href="?mod=user&task=reSendEmail">Gửi lại email kích hoạt tài khoản</a><br /><br />
				<a href="?mod=user&task=password">Quên mật khẩu</a>
			</form>
			
			<h3 style="margin-top: 20px; margin-bottom: 0px; padding-top: 20px; border-top: 1px dotted gray;">Bạn chưa có tài khoản ? vui lòng <a href="?mod=user&task=register">đăng ký tài khoản tại đây</a></h3>
			{/if}
		{/if}
    </div>
</div>    
