<a href="" class="head_title">Bài viết nổi bật</a>
<ul class="blog-list-left">
  {foreach from=$rows item=row key=k}
  <li class="item-bl"> <img src="{$url}upload/news/thumb/{$row.photo|default:'no-img.jpg'}" width="70" style="float: left; margin-right: 10px">
  <div class="info-blog-w"> <a class="blog-title-link" href="{$url}{$row.pre_link}-{$row.id}.html">{$row.title}</a> </div>
  </li>
  {/foreach}
</ul>