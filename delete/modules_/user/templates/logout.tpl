
<style type="text/css">
.red { color:red; }
.green { color:green; }
</style>

<div class="row">
	<div class="float-left" style="width:690px;">
		
		<div class="box margin-20 padding-10" style="padding-bottom:20px;">
			<h4 class="box-title">Đăng xuất</h4>
			
			{if $msg_success!=''}
				<p class="green">{$msg_success}</p>
			{elseif $msg_error!=''}	
				<p class="red">{$msg_error}</p>
			{/if}
			
		</div>
		
	</div>
	
	<div class="float-right" style="width:288px;">	
	
		<div class="box margin-20" style="padding:10px 0;">
			{include file='support.tpl'}
		</div>
		
	</div>
	
	<div class="clear"></div>
	
</div>
