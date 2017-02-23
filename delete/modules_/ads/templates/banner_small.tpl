{if $rows}
	{foreach from=$rows item=row key=k}
    	{if $k < 2}
    	<li><a href="{$row.link}" {if !$row.link}onclick="return false"{/if} title="{$row.title}" target="{$row.target}"><img src="{$url}upload/ads/334x216/{$row.photo}" alt="{$row.title}"/></a></li>
    	{/if}
    {/foreach}
{/if}