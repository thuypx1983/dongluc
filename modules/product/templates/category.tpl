<script src="{$url}js/main.js" type="text/javascript"></script>

<a href="{$url}san-pham/" class="head_title">Danh mục sản phẩm</a>
        <div id='cssmenu'>

        <ul>
        	{if $smarty.get.mod=='product'}{$menu_select=$smarty.get.id}{/if}
	    	{foreach from=$rows item=row key=k}
	    		<li {if $menu_select|in_array:$row.sub_ids || $menu_select==$row.id}class="active"{/if}><a href="{if $row.link_to!=''}{$row.link_to}{else}{$url}{$row.link}-{$row.id}/{/if}"><span>{$row.title}</span><i></i></a>
    				{if $row.sub}
		            <!-- <ul style="display:block"> -->
                    <ul{if $menu_select|in_array:$row.sub_ids || $menu_select==$row.id} style="display:block"{/if}>
		            	{foreach from=$row.sub item=r}
                        <li {if $menu_select|in_array:$r.sub_ids || $menu_select==$r.id}class="active"{/if}><a href="{if $r.link_to!=''}{$r.link_to}{else}{$url}{$r.link}-{$r.id}/{/if}"><span>{$r.title}</span>{if $r.sub}<i></i>{/if}</a>
                            {if $r.sub}
                            <ul{if $menu_select|in_array:$r.sub_ids || $menu_select==$r.id } style="display:block"{/if} class="sub_menu">
        		            	{foreach from=$r.sub item=child_sub}
        		                 <li {if $menu_select==$child_sub.id}class="active"{/if}><a href="{if $child_sub.link_to!=''}{$child_sub.link_to}{else}{$url}{$child_sub.link}-{$child_sub.id}/{/if}">{$child_sub.title}{if $child_sub.sub}<i></i>{/if}</a>
                                    {if $child_sub.sub}
                                    <ul{if $menu_select|in_array:$child_sub.sub_ids || $menu_select==$r.id} style="display:block"{/if} class="sub_menu">
                		            	{foreach from=$r.sub item=end_child}
                		                <li {if $menu_select==$end_child.id}class="active"{/if}><a href="{if $end_child.link_to!=''}{$end_child.link_to}{else}{$url}{$end_child.link}-{$end_child.id}/{/if}">{$end_child.title}{if $end_child.sub}<i></i>{/if}</a>
                                        
                                        </li>
                		                {/foreach}
                		            </ul>
                                    {/if}
                                </li>
        		                {/foreach}
        		            </ul>
                            {/if}
                        </li>
		                {/foreach}
		            </ul>
		            {/if}
	    		</li>
	    	{/foreach}
         </ul>
          <a href="{$url}san-pham/" class="view_all_cate">Xem toàn bộ</a> </div>

