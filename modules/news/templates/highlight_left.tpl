<div class="highlight-left">
    <ul class="news-items">
        {foreach from=$rows item=row key=k}
            <li class="news-item"> 
				<div class="highlight-left-img-wrapper">
					<img src="{$url}upload/news/{$row.photo|default:'no-img.jpg'}" width="70" style="float: left; margin-right: 10px">
				</div>
                <div class="info-blog-w">
					<a class="blog-title-link" href="{$url}{$row.pre_link}-{$row.id}.html">{$row.title}</a>
					<div class="blog-description">{$row.description}</div>
				</div>
            </li>
        {/foreach}
    </ul>
</div>