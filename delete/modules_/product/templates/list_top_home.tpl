<div class="content_home pkg"> <a href="" class="head_title">Sản phẩm nổi bật</a>

      <ul class="hot_product">
        {foreach from=$rows item=row key=k}
        <li>
                <div class="box_product"><a class="img_product" href="{$url}{$row.link}-{$row.id}.html"><img src="{$url}upload/product/thumb/{$row.photo|default:'no-img.jpg'}" /><span class="view_more">chi tiết</span><span class="price_item">{$row.price_sale|number_format:0:".":","} vnđ</span></a>
                  <div class="price_product"> <a href="{$url}{$row.link}-{$row.id}.html" class="name_product">{$row.title}</a>
                    <div class="code_prodcut">Mã: {$row.code}</div>
                  </div>
                </div>
              </li>
        {/foreach}
      </ul>
    </div>

    <script type="text/javascript">
  $(document).ready(function(){
    $('.hot_product').bxSlider({
    minSlides: 2,
    maxSlides: 5,
    moveSlides:4,
    slideWidth: 180,
    slideMargin: 39,
    auto:true,
    });
  })
  </script>

  