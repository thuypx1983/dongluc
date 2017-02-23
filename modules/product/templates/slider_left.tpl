<div class="product-slider-right ">
      <ul class="product-slider-right">
        {foreach from=$rows item=row key=k}
        <li>
                <div class="box_product"><a class="img_product" href="{if $row.link_out!=''}{$row.link_out}{else}{$url}{$row.link}-{$row.id}.html{/if}"><img src="{$url}upload/product/thumb/{$row.photo|default:'no-img.jpg'}" /><span class="view_more">chi tiết</span><span class="price_item">{$row.price_sale|number_format:0:".":","} vnđ</span></a>
                  <div class="price_product"> <a href="{if $row.link_out!=''}{$row.link_out}{else}{$url}{$row.link}-{$row.id}.html{/if}" class="name_product">{$row.title}</a>
                    <div class="code_prodcut">Mã: {$row.code}</div>
                  </div>
                </div>
              </li>
        {/foreach}
      </ul>
    </div>

  