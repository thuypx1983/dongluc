<script src="{$url}js/main.js" type="text/javascript"></script>

<a href="{$url}dich-vu/" class="head_title">Danh mục</a>
<div id='cssmenu'>

<ul>
	{if $smarty.get.mod=='news'}{$menu_select=$smarty.get.id}{/if}
	{foreach from=$rows item=row key=k}
		<li {if $menu_select|in_array:$row.sub_ids || $menu_select==$row.id}class="active"{/if}><a href="{if $row.link_to!=''}{$row.link_to}{else}{$url}{$row.pre_link}-{$row.id}/{/if}"><span>{$row.title}</span><i></i></a>
			{if $row.sub}
            <!-- <ul style="display:block"> -->
            <ul{if $menu_select|in_array:$row.sub_ids || $menu_select==$row.id} style="display:block"{/if}>
            	{foreach from=$row.sub item=r}
                <li {if $menu_select==$r.id}class="active"{/if}><a href="{if $r.link_to!=''}{$r.link_to}{else}{$url}{$r.pre_link}-{$r.id}/{/if}">{$r.title}</a></li>
                {/foreach}
            </ul>
            {/if}
		</li>
	{/foreach}
 </ul>
</div>

