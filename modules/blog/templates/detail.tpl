<div class="container">
	<div class="row">
		<div class="span9 news-media">
			<div class="border shadow margin">
				<h2 class="media-heading-tittle">{$root_title}&nbsp;&#187;&nbsp;{$row.category}</h2>
				<div class="media">
				  <!--<a class="pull-left" href="{$url}{$root_link}/{$row.parent_link}/{$row.link}.html">
					<img src="{$url}upload/news/{$row.photo}" alt="{$row.seo_photo_alt}">
				  </a>-->
				  <div class="media-body">
					<h4 class="media-heading">{$row.title}</h4>
					<span class="media-info">Ngày đăng: {$row.create_date|date_format:"%d/%m/%Y"}</span>
					<p>{$row.description|strip_tags}</p>
				
				  </div>
					  {$row.content}
				</div>
				<div class="media-others">
					<h3>Các tin khác</h3>
					<ul class="media-li">
						{foreach from=$rows item=row key=k}
							<li><a href="{$url}{$root_link}/{$row.parent_link}/{$row.link}.html">{$row.title}</a></li>
						{foreachelse}
							<div style="margin-left:-18px;">
								<em><p>Chưa có bài viết nào</p></em>
							</div>
						{/foreach}
					</ul>
				</div>          
			</div>
		</div>
		<div class="span3">
			{loadModule mod=news task=category}
			{loadModule mod=ads task=right}
		</div>
		<div class="clearfix"></div>
	</div>
</div>