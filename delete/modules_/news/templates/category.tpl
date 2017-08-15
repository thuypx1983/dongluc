<style>
.h3_news { font-size:14px; padding:0; margin:0; font-weight:normal; display:inline-block; }
</style>

<div class="box_left">
        <div class="head_left a_upper">{$row_title}</div>
        <ul class="list_menu_service">
        	{foreach from=$rows item=row key=k}	
            <li {if $row.id==$smarty.get.id}class="active"{/if}><a href="{$url}{$row.pre_link}-{$row.id}/" title="{$row.title}"><h3 class="h3_news">{$row.title}</h3></a></li>
            {/foreach}
        </ul>
      </div>