
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
		<h3 class="line-title">Kích hoạt lại tài khoản</h3>
        
		{if $msg_success!=''}
			<p class="green">{$msg_success}</p>
		{elseif $msg_error!=''}	
			<p class="red">{$msg_error}</p>
		{/if}
		
		{if $msg_success==''}
		<p>Nếu bạn không nhận được thư kích hoạt tài khoản trong quá trình đăng ký tài khoản, vui lòng nhập thông tin bên dưới để thực hiện kích hoạt lại tài khoản</p>		
        <form id="login_form" class="form-horizontal animate" method="post">
            <input name="username" class="input-300" placeholder="Username" value="{$smarty.post.username}" type="text" ><br />            
            <input name="password" class="input-300" placeholder="Password" value="{$smarty.post.password}" type="password"><br />
			<p>Hệ thống sẽ gửi mail xác nhận kích hoạt tài khoản vào hòm thư mà bạn đã đăng ký cho tài khoản trên.</p>
			<p> Nếu bạn cho rằng email của bạn có thể bị lỗi hoặc sai địa chỉ, vui lòng click vào <a style="font-weight: bold;" href="#" onclick="$('input[name=email]').show(); return false;">đây</a> để nhập email mới cho tài khoản của bạn.</p>
            <input  {if $smarty.post.email==''}style="display: none;"{/if} name="email" value="{$smarty.post.email}" class="input-300" placeholder="Email mới cho tài khoản của bạn" type="email"><br />
            <button type="submit" name="" value="" class="submit">Gửi lại email</button>
	        <button type="button" onclick="location.href='{$url}?mod=user&task=login'">Quay lại</button>
        </form>
		{/if}
    </div>
</div>   
