

<link rel="stylesheet" href="{$path}general.css" type="text/css" media="screen">
<script type="text/javascript" src="{$path}validation.js"></script>

<style type="text/css">
.bao_form
{
	padding:20px;
}
</style>

<div class="bao_form">
	<h1>Step 3</h1>
	<div style="margin-bottom:30px;">
    	{$error}<br>
        Xác thực
        
        <br>
		Loại tài khoản :
       <br>

        {if $smarty.session.utype=='adv'}
        	Advertiser
        {elseif $smarty.session.utype=='pub'}
        	Publisher
        {else}
        	Publisher + Advertiser
        {/if}
        
    </div>
    
</div>





















