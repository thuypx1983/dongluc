<a href="" class="head_title">Quảng cáo</a>
{if $rows}
	<div>
	{foreach from=$rows item=row key=k}
    	{if $k == 0}
    	<a href="{$row.link}" {if !$row.link}onclick="return false"{/if} title="{$row.title}" target="{$row.target}"><img src="{$url}upload/ads/270x400/{$row.photo}" alt="{$row.title}"/></a>
    	{/if}
    {/foreach}
    </div>
{/if}