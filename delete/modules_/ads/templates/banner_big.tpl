{if $rows}
<div class="content_home pkg banner_big">
	{foreach from=$rows item=row key=k}
    	{if $k ==0}
    	<a href="{$row.link}" {if !$row.link}onclick="return false"{/if} title="{$row.title}" target="{$row.target}"><img src="{$url}upload/ads/1060x454/{$row.photo}" alt="{$row.title}"/></a>
    	{/if}
    {/foreach}
</div>
{/if}