<div class="banner-right-highlight-wrapper">
    <ul class="banner-right-highlight">
        {foreach from=$rows item=row key=k}
            <li>
                <a href="{$row.link}" {if !$row.link}onclick="return false"{/if} title="{$row.title}" target="{$row.target}">
                    <img src="{$url}upload/ads/{$row.photo}" alt="{$row.title}" />
                </a>
            </li>
        {/foreach}
    </ul>
</div>
