
<div class="h_danhmuc">Danh mục tin</div>
<div class="h_category">
	{foreach from=$rows item=row key=k}
		<div class="h_category_item {if $k==0}no-border{/if}"><a href="{$url}{$row.pre_link}" title="{$row.title}" {if $smarty.get.category==$row.link}class="active"{/if}><h2>&#187;&nbsp;&nbsp;&nbsp;&nbsp;{$row.title}</h2></a></div>
	{/foreach}
</div>