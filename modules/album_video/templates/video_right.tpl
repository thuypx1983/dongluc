
{if $rows}
<ul>
	{foreach from=$rows item=row}
	<li><a href="{$url}{$row.link}-{$row.id}.html"><img src="{$url}upload/gallery/video/thumb/{$row.photo}" /></a></li>
	{/foreach}
</ul>
{/if}