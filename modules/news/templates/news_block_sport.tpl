<div class="news-sport">
    <div class="block-title">
        <a href="#">Tin tức thể thao</a>
    </div>
    <ul class="news-items">
        {foreach from=$rows item=row key=k}
            <li class="news-item"> <img src="{$url}upload/news/{$row.photo|default:'no-img.jpg'}" width="70" style="float: left; margin-right: 10px">
                <div class="info-blog-w">
                    <a class="blog-title-link" href="{$url}{$row.pre_link}-{$row.id}.html">{$row.title}</a>
                    <span class="news-summary">{$row.description}</span>
                </div>
            </li>
        {/foreach}
    </ul>
</div>