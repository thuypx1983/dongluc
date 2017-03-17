
{if $rows}

        <ul class="partner-items">
            {foreach from=$rows item=row key=k}
                <li class="partner-item">
					<div class="partner-item-wrapper">
						<a href="{$row.link}" {if !$row.link}onclick="return false"{/if} title="{$row.title}" target="{$row.target}">
							<img src="{$url}upload/ads/{$row.photo}" alt="{$row.title}" />
						</a>
					</div>
				</li>
            {/foreach}
        </ul>

{/if}