
{if $rows}

    <ul class="video-items">
        {foreach from=$rows item=row key=k}
            <li class="video-item"><a class="thumb300 thumbblock" href="http://www.youtube.com/v/ZeStnz5c2GI?fs=1&amp;autoplay=1" title="{$row.title}" target="{$row.target}"><img src="{$url}upload/ads/{$row.photo}" alt="{$row.title}"/></a></li>
        {/foreach}
    </ul>

{/if}