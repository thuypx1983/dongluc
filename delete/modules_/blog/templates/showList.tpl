<div class="container">
	<div class="row">
		<div class="span9 news-media">
			<div class="border shadow margin">
				<h2 class="media-heading-tittle">{$root_title}{if $smarty.get.category!=''}&nbsp;&#187;&nbsp;{$aPage.title}{/if}</h2>
				<!--{foreach from=$rows item=row key=k}
					<div class="media" {if ($k+1)==count($rows)} style="border-bottom:none;" {/if}>
					  <a class="pull-left" href="{$url}{$root_link}/{$row.parent_link}/{$row.link}.html">
						<img src="{$url}upload/news/{$row.photo}" alt="{$row.seo_photo_alt}" />
					  </a>
					  <div class="media-body">
						<h4 class="media-heading">{$row.title}</h4>
						<span class="media-info">Ngày đăng: {$row.create_date|date_format:"%d/%m/%Y"}</span>
						<p>{$row.description|truncate:500|strip_tags}</p>
						 <div><a href="{$url}{$root_link}/{$row.parent_link}/{$row.link}.html" class="btn">Xem tiếp</a></div>
					  </div>
					</div>
				{foreachelse}
					<div style="margin-left:20px; padding:20px 0;">
						<em><p>Chưa có bài viết nào</p></em>
					</div>
				{/foreach}-->
				
				{foreach from=$rows item=row key=k}
					<div class="news_bao">
						<h3><a href="{$url}{$root_link}/{$row.parent_link}/{$row.link}.html" title="{$row.title}">&#187;&nbsp;{$row.title}</a></h3>
						<a href="{$url}{$root_link}/{$row.parent_link}/{$row.link}.html" title=""><!--<img src="http://oceanbank.vn/ImageHandler.ashx?ImageID=636" />--><img src="{$url}upload/news/{$row.photo|default:'../../img_cust/default2.jpg'}" alt="{$row.seo_photo_alt}" /></a>
						<div>{$row.description|truncate:400|strip_tags}<a href="{$url}{$root_link}/{$row.parent_link}/{$row.link}.html" title="Xem tiếp">Xem tiếp</a></div>
	
					</div>
				{foreachelse}
					<div style="margin-left:20px; padding:20px 0;">
						<em><p>Chưa có bài viết nào</p></em>
					</div>
				{/foreach}
				
				
				
				<div style="clear:both;"></div>
			</div>
			
			<div class="page" {if !$paging}style="border:none;"{/if}>
				<div style="display:inline-block;" class="cust_page">{$paging}</div>
					<link href="{$url}css_cust/paging_style.css" rel="stylesheet" type="text/css" />
					<script type="text/javascript">

					$(function(){
						$('.cust_page .paging_link_class').each(function(){
							temp = $(this);
							if(isNaN(temp.text())) {
								temp
									.css('width', '60px');
							}
						});
					});
					
					</script>
				</div>
					
				<!--<div class="page">
			  <ul>
				<li><a href="#">Prev</a></li>
				<li><a href="#">1</a></li>
				<li><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li><a href="#">4</a></li>
				<li><a href="#">5</a></li>
				<li><a href="#">Next</a></li>
			  </ul>
			</div>-->
		</div>
		<div class="span3">
			
			{loadModule mod=news task=category}
			{loadModule mod=ads task=right}
		</div>
		<div class="clearfix"></div>
	</div>
</div>