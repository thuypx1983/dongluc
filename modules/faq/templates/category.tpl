
<ul class="menu_220">
	{foreach from=$rows item=row key=k}	
    <li {if $row.id==$smarty.get.id}class="active"{/if}><a href="{$url}{$row.pre_link}-{$row.id}/" title="{$row.title}">{$row.title}</a></li>
    {/foreach}
</ul>