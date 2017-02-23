
<div class="grid1060">
    <div class="content_cate"> <a href="{$url}san-pham/" class="head_title">Danh mục sản phẩm</a>
      <ul class="pkg list_menu_product">
        {foreach from=$rows item=row key=k}
            <!-- <div class="news_bao">
                <h3><a href="{$url}{$root_link}/{$row.parent_link}/{$row.link}.html" title="{$row.title}">&#187;&nbsp;{$row.title}</a></h3>
                <a href="{$url}{$root_link}/{$row.parent_link}/{$row.link}.html" title=""><img src="{$url}upload/news/{$row.photo|default:'../../img_cust/default2.jpg'}" alt="{$row.seo_photo_alt}" /></a>
                <div>{$row.description|truncate:400|strip_tags}<a href="{$url}{$root_link}/{$row.parent_link}/{$row.link}.html" title="Xem tiếp">Xem tiếp</a></div>

            </div> -->
            <li><a href="{$url}{$row.link}-{$row.id}/"><span class="name_cate">{$row.title}</span><img src="{$url}upload/category/thumb/{$row.thumb|default:'no-img.jpg'}"/> </a></li>
        {foreachelse}
            <div style="margin-left:20px; padding:10px 0 20px;">
                <em><p>Chưa cập nhật nội dung</p></em>
            </div>
        {/foreach}
      </ul>
    </div>
  </div>