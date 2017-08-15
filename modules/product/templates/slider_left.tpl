<div class="product-slider-right-wrapper">
      <ul class="product-slider-right">
        {foreach from=$rows item=row key=k}
        <li>
                <div class="box_product">
                    <a class="img_product" href="{if $row.link_out!=''}{$row.link_out}{else}{$url}{$row.link}-{$row.id}.html{/if}">
						<div class="bp-img-wrapper">
							<img src="{$url}upload/product/thumb/{$row.photo|default:'no-img.jpg'}" />
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

  