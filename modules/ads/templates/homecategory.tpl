<div class="product-slider-right ">
    <ul class="product-slider-right">
        {foreach from=$rows item=row key=k}
            <li>
                <div class="box_product">
                    <a class="img_product" href="{$row.link}" target="{$row.target}">
                        <img src="{$url}upload/ads/{$row.photo}" />
                        <span class="view_more">{$row.title}</span>
                    </a>
                </div>
            </li>
        {/foreach}
    </ul>
</div>

