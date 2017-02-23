{if !empty($smarty.session.user)}
<div class="hung_info_header">
	<div class="hung_info">Xin chào : <a href="{$url}?mod={$smarty.get.mod}&task=user&utask=update_profile" class="green_new bold" title="Thông tin tài khoản">{$smarty.session.user.username}</a></div>
	{if $smarty.get.mod=='advertiser'}
		<div class="hung_info" style="position:relative;">Tài khoản : <a class="green_new bold" href="{$url}?mod=advertiser&task=income_money" title="">${$smarty.session.user.adv_money}</a>
		<span style="position:absolute; bottom:-20px; left:-4px; color:#ccc; font-size:11px; font-weight:bold;">(Advertiser)</span>
		</div>
	{else}
		<div class="hung_info" style="position:relative;">Tài khoản : <a href="{$url}?mod=publisher&task=withdraw" class="green_new bold" title="">${$smarty.session.user.pub_money}</a>
		<span style="position:absolute; bottom:-20px; left:-4px; color:#ccc; font-size:11px; font-weight:bold;">(Publisher)</span>
		</div>
	{/if}
	
	<div class="hung_info">Thư mới : <a href="{$url}?mod={$smarty.get.mod}&task=user&utask=message_list" class="green_new bold">{$message_count}</a></div>
	<a href="{$url}" class="hung_a hung_home"></a>
	<a href="{$url}?mod=user&task=logout" class="hung_a hung_logout"></a>
	
	<div style="clear:both;"></div>
</div>
{/if}