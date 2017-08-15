<ul class="list_school pkg">
	{if $rows}
        {foreach from=$rows item=row}
            <li><span class="list_square fl"></span><a href="{if $row.link_to!=''}{$row.link_to}{else}{$url}{$row.pre_link}-{$row.id}/{/if}" class="fl">{$row.title}</a></li> 
        {/foreach}
    {/if}
  </ul>