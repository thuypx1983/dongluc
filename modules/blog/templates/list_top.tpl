
<div class="h_noibat">Bài viết nổi bật</div>
<div class="h_hotpost">
	{foreach from=$rows item=row key=k}
		<div class="h_hotpost_item {if $k==0}no-border{/if}"><a href="{$url}{$row.pre_link}.html" title="{$row.title}"><h4>&bull;&nbsp;&nbsp;&nbsp;&nbsp;{$row.title}&nbsp;({$row.create_date|date_format:"%d/%m/%Y"})</h4></a></div>
	{foreachelse}		
		Chưa có bài viết nào
	{/foreach}
</div>