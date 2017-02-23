<script src="{$url}js/main.js" type="text/javascript"></script>

<a href="{$url}san-pham/" class="head_title">Danh mục sản phẩm</a>
        <div id='cssmenu'>

        <ul>
        	{if $smarty.get.mod=='product'}{$menu_select=$smarty.get.id}{/if}
	    	{foreach from=$rows item=row key=k}
	    		<li {if $menu_select|in_array:$row.sub_ids || $menu_select==$row.id}class="active"{/if}><a href="{$url}{$row.link}-{$row.id}/"><span>{$row.title}</span><i></i></a>
    				{if $row.sub}
		            <!-- <ul style="display:block"> -->
                    <ul{if $menu_select|in_array:$row.sub_ids || $menu_select==$row.id} style="display:block"{/if}>
		            	{foreach from=$row.sub item=r}
		                <li {if $menu_select==$r.id}class="active"{/if}><a href="{$url}{$r.link}-{$r.id}/">{$r.title}</a></li>
		                {/foreach}
		            </ul>
		            {/if}
	    		</li>
	    	{/foreach}
         </ul>
          <a href="{$url}san-pham/" class="view_all_cate">Xem toàn bộ</a> </div>

