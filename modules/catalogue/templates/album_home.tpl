<style>
.h2_home { font-size:16px; padding:0; margin:0; font-weight:normal; }
</style>
<ul class="list_album_index">
	{foreach from=$rows item=row}
        <li>
            <a href="{$url}{$row.link}-{$row.id}.html" class="thumb194 thumb_over"><img src="{$url}upload/gallery/album/thumb/{$row.photo}" alt="{$row.title}"/> </a>
            <a href="{$url}{$row.link}-{$row.id}.html" class="title_list_album_index">
            	<!--<strong>{$row.title}</strong>-->
                {*
                	Album cưới <br /> <strong>Tùng - Vân Anh</strong>
                *}
                
                <h2 class="h2_home">{foreach from=$row.title_arr item=r key=k}
                	{if $k == 2}
					<strong>
                    {/if}
                    {$r}
                    {if $k == (count($row.title_arr)-1)}
                    </strong>
                    {/if}
                	{if $k == 1}
					<br>
                    {/if}
                {/foreach}</h2>
            </a>
        </li>
    {/foreach}
</ul>