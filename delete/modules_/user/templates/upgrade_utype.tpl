<link rel="stylesheet" href="{$url}lib/jquery-ui-1.9.0.custom/themes/base/jquery.ui.all.css">
<script type="text/javascript">

$(function(){
	$('input[type="button"], [type="submit"]').button();
});

</script>
<div class="c-content">
	<div class="buttom-20">
		<h3 class="line-title">Nâng cấp tài khoản</h3>
        
		{if $msg_success!=''}
			<p class="green">{$msg_success}</p>
		{elseif $msg_error!=''}	
			<p class="red">{$msg_error}</p>
		{/if}

		{if $msg_success==''}
        <form method="post" onsubmit="return confirms()">
            <div style=" height:300px;">
                <p>»&nbsp;&nbsp;Tài khoản của bạn sẽ được nâng cấp lên thành <strong>Publisher + Advertiser</strong></p>
                <p>»&nbsp;&nbsp;Bạn sẽ sử dụng được chức năng của cả Publisher và Advertiser</p>            <p>»&nbsp;&nbsp;Số tiền của tài khoản Advertiser và của Publisher là khác nhau</p>            <p>»&nbsp;&nbsp;Bạn có thể chuyển tiền từ tài khoản Publisher sang Advertiser để mua textlink</p>
                <div style="height:20px;"></div>
                <input type="submit" value="Nâng cấp ngay bây giờ" />
            </div>
        </form>
        {/if}
    </div>
</div>        