<div class="product-slider-right ">
      <ul class="product-slider-right">
        {foreach from=$rows item=row key=k}
        <li>
                <div class="box_product">
                    <a class="img_product" href="{if $row.link_out!=''}{$row.link_out}{else}{$url}{$row.link}-{$row.id}.html{/if}">
                        <img src="{$url}upload/product/thumb/{$row.photo|default:'no-img.jpg'}" />
                        <span class="view_more">{$row.title}</span>

                    </a>
                </div>
              </li>
        {/foreach}
      </ul>
    </div>

  