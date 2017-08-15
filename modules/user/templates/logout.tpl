
<style type="text/css">
.red { color:red; }
.green { color:green; }
</style>
<div class="grid1060">
    <div class="content_cate">
      <div class="pkg">
        <div class="col30per fl collog"> <a href="" class="head_title">Chức năng</a>
			<div><a href="{$url}don-hang.html" class="f16gray user_mod {if $smarty.get.task==history}active{/if}">Đơn hàng của bạn</a></div>
			<div><a href="{$url}thong-tin-ca-nhan.html" class="f16gray user_mod {if $smarty.get.task==update_profile}active{/if}">Thông tin cá nhân</a></div>
		 </div>
        <div class="col70per fr collog"> <a href="" class="head_title">Đăng xuất</a>
		  
		  {if $msg_success!=''}
				<p class="green">{$msg_success}</p>
			{elseif $msg_error!=''}	
				<p class="red">{$msg_error}</p>
			{/if}
		  
        </div>
      </div>
    </div>
  </div>