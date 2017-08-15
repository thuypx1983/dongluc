
{if $rows}

    <ul class="video-items">
        {foreach from=$rows item=row key=k}
            <li class="video-item">
                <a class="thumb300 thumbblock" href="{$row.video_src}" title="{$row.title}" target="{$row.target}">
                    <img class="lazyload" data-src="{$url}upload/ads/{$row.photo}" alt="{$row.title}"/>
                </a>
                <a class="video-title" href="/videos/{$row.id}.html">
                    {$row.title}
                </a>
                <div class="video-summary">{$row.summary}</div>
            </li>
        {/foreach}
    </ul>

{/if}