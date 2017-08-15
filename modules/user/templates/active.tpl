<style type="text/css">
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
          
		  {if $msg_success!=''}
				<p class="green">{$msg_success}</p>
				<div style="height:12px;"></div>
				<a href="{$url}dang-nhap.html"class="btn">Đăng nhập ngay</a>
			{elseif $msg_error!=''}	
				<p class="red">Rất tiếc! {$msg_error}</p>
			{/if}
		  
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
			{if $msg_success!=''}
				<p class="green">{$msg_success}</p>
				<div style="height:12px;"></div>
				<a href="{$url}dang-nhap/"class="btn">đăng nhập ngay</a>
			{elseif $msg_error!=''}	
				<p class="red">Rất tiếc! {$msg_error}</p>
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

-->


