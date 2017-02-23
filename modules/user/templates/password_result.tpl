
  <div class="content-header">
    <div class="container">
      <div class="row">
       
		<h2 class="span12 head-tittle">Lấy lại mật khẩu cho tài khoản Advertiser</h2>
		
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div style="height:42px;"></div>
	
	<div style="margin-left:20px;">
	{if $msg_success!=''}
		<p class="green">{$msg_success}</p>
		<div style="height:12px;"></div>
		<a href="#account" data-toggle="modal" class="btn btn-adv btn-large">đăng nhập ngay</a>
	{elseif $msg_error!=''}	
		<p class="red">Rất tiếc! {$msg_error}</p>
	{/if}
	</div>
  </div>
</div>
<div style="height:40px;"></div>

<style type="text/css">
.red { color:red; }
.green { color:green; }
</style>