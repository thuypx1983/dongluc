<ul class="news-items">
    {foreach from=$rows item=row key=k}
        <li class="news-item"> 
			<div class="news-service-img-wrapper">
				<img src="{$url}upload/news/{$row.photo|default:'no-img.jpg'}" />
			</div>
            <div class="info-blog-w"> 
				<a class="blog-title-link" href="{$url}{$row.pre_link}-{$row.id}.html">{$row.title}</a> 
			</div>
        </li>
    {/foreach}
</ul>