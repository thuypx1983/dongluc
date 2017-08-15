<link rel="stylesheet" href="{$path}general.css" type="text/css" media="screen">
<script type="text/javascript" src="{$path}validation.js"></script>

<style type="text/css">
.bao_form
{
	padding:20px;
}
</style>
<div class="c-content">
    <div class="buttom-20">
        <h3 class="line-title">Mời bạn xác thực tài khoản (cũng chỉ mất vài phút)</h3>
        
        {$error}
        Xác thực
        
        <br>
		Loại tài khoản :
       <br>

        {if $smarty.session.utype=='adv'}
        	Advertiser
        {elseif $smarty.session.utype=='pub'}
        	Publisher
        {elseif $smarty.session.utype=='pub+adv'}
        	Publisher + Advertiser
        {/if}
        
        
	</div>
</div>    
