<div class="news-sport">
    <h2 class="block-title">
        <a href="#">Tin tức thể thao</a>
    </h2>
    <ul class="news-items">
        {foreach from=$rows item=row key=k}
            <li class="news-item"> <img class="lazyload" data-src="{$url}upload/news/{$row.photo|default:'no-img.jpg'}" width="70" style="float: left; margin-right: 10px">
                <div class="info-blog-w">
                    <h3><a class="blog-title-link" href="{$url}{$row.pre_link}-{$row.id}.html">{$row.title}</a></h3>
                    <span class="news-summary">{$row.description}</span>
                </div>
            </li>
        {/foreach}
    </ul>
</div>