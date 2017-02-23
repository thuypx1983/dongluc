
{if $rows}
<ul class="show_menu" style="max-height:194px !important; height:auto !important;">
	{foreach from=$rows item=row key=k}
    	<li {if $k==0}class="title"{/if}><a href="{$row.link_to}">{$row.title}</a></li>
    {/foreach}
</ul>
<div class="arr_show_hide"><a href="javascritp:;" class="btn_show_menu"></a></div>
{/if}