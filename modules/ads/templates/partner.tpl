
{if $rows}

        <ul class="partner-items">
            {foreach from=$rows item=row key=k}
                <li class="partner-item"><a class="thumb300 thumbblock" href="{$row.link}" {if !$row.link}onclick="return false"{/if} title="{$row.title}" target="{$row.target}"><img src="{$url}upload/ads/thumb/{$row.photo}" alt="{$row.title}"/></a></li>
            {/foreach}
        </ul>

{/if}