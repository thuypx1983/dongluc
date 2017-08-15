
{if $rows}
<ul>
	{foreach from=$rows item=row}
	<li><a href="{$url}{$row.link}-{$row.album_id}.html"><img src="{$url}upload/gallery/photo/120x90/{$row.photo}" /></a></li>
{/foreach}
</ul>{/if}