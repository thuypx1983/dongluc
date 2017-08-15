<div class="content">
    <div class="grid960">
        <div class="breakcump fr">
            <a href="{$url}">{$text_home}</a> &#187; 
            <a href="{$url}{$row.link}/" class="active">{$row.title}</a>
        </div>
        <div class="clear"></div>
        <div class="title_product">{$row.title}</div>
	</div>
    <div class="border_slide_home">
    	<div class="grid960"></div>
    </div>
    <div class="grid960">
        <div class="img_focus">
            <img src="{$url}upload/type/{$row.photo}" alt="{$row.title}"  width="960" />
        </div>
        {*foreach from=$rows item=row key=k}
            <div class="list_subcate fl {if ($k+1)%3==0}last{/if}">
            	<div class="title_list_subcate"><a href="{$url}{$row.pre_link}-{$row.id}/">{$row.title}</a></div>
                {if $row.sub}
                <ul class="list_name_subcate">
                	{foreach from=$row.sub item=r}
                    	<li><a href="{$url}{$r.pre_link}-{$r.id}/">{$r.title}</a></li>
                    {/foreach}
                </ul>
                {/if}
            </div>
            {if ($k+1)%3==0}
            <div class="clear"></div>
            {/if}
        {/foreach*}
        
        {foreach from=$rows item=row key=k}
        <div style="margin-bottom:30px;">
        	<!--<a href="{$url}{$row.link}-{$row.id}.html"><img src="{$url}upload/product/{$row.photo}" alt="{$row.title}"></a>-->
            <div style="border-bottom:1px dotted #ccc; margin-bottom:20px; padding-bottom:10px;">
            	<h3><a href="{$url}{$row.pre_link}-{$row.id}.html">{$row.title}</a></h3>
            </div>
            <div style="float:left; width:200px;">
                <a href="{$url}{$row.pre_link}-{$row.id}.html"><img style="width:200px;" src="{$url}upload/category/thumb/{$row.thumb}" alt="{$row.title}"></a>
            </div>
            <div style="float:right; width:740px;">
            	{$row.content|strip_tags|truncate:300}
			<a href="{$url}{$row.pre_link}-{$row.id}.html" style="font-weight:bold;">&nbsp;&rarr;&nbsp;Xem thêm</a>
            </div>
            <div style="clear:both;"></div>
        </div>
        {/foreach}
        
        
        <div class="clear"></div>
    </div>
</div>