
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
		<h3 class="line-title">Xác nhận email mới</h3>
        
		{if $msg_success!=''}
			<p class="green">{$msg_success}</p>
		{elseif $msg_error!=''}	
			<p class="red">{$msg_error}</p>
		{/if}
		
    </div>
</div>   
