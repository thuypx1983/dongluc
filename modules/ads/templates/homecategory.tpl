<div class="product-slider-right-wrapper">
    <ul class="product-slider-right">
        {foreach from=$rows item=row key=k}
            <li>
                <div class="box_product">
                    <a class="img_product" href="{$row.link}" target="{$row.target}">
                        <div class="bp-img-wrapper">
							<img class="lazyload" data-src="{$url}upload/ads/{$row.photo}" />
						</div>
						<div class="bp-overlay-wrapper">
							<span class="view_more">{$row.title}</span>
						</div>
                    </a>
                </div>
            </li>
        {/foreach}
    </ul>
</div>
