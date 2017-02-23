

{if $rows}
<ul>
{foreach from=$rows item=row key=k}
	<li><a href="{$url}{$root_link}/{$row.link}">{$row.title}</a></li>
{/foreach}
</ul>
{/if}