
<link rel="stylesheet" href="{$url}lib/jquery-ui-1.9.0.custom/themes/base/jquery.ui.all.css">
<style type="text/css">
#login_form 
{
	line-height:18px;
}
#login_form input[type="text"], [type="password"], [type="email"]
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
	$('[type="button"], [type="submit"]').button();
});

</script>

<div class="c-content">
	<div class="buttom-20">
		<h3 class="line-title">Lấy lại mật khẩu</h3>

        {if $msg_success!=''}
			<p class="green">{$msg_success}</p>
		{elseif $msg_error!=''}	
			<p class="red">{$msg_error}</p>
		{/if}
        
		{if $msg_success==''}
		<p>Vui lòng nhập địa chỉ email mà bạn đăng ký cho tài khoản Textlink.vn</p>
		<p>Hệ thống sẽ gửi mail xác nhận mật khẩu mới vào địa chỉ email của bạn.</p>		
        <form id="login_form" class="form-horizontal animate" method="post">
            {*<input name="tex_username" class="input-300" value="{$smarty.post.tex_username}" placeholder="Username" type="text" >
			<br />*}			
            <input name="tex_email" class="input-300" value="{$smarty.post.tex_email}" placeholder="Email của bạn" type="email" ><br />
            <button type="submit" name="" value="" class="submit">Lấy lại mật khẩu</button>	
			<button type="button" onClick="location.href='?mod=user&task=login'">Quay lại</button>                
        </form>
		{/if}
	</div>
</div>