
<!--<div class="container_12">
	<div class="grid_8">sdsdsd</div>
	<div class="grid_4">sdsdsd</div>
	<div class="clearfix"></div>
</div>-->
<link href="{$url}style_cust/news_style.css" rel="stylesheet" />

<div class="content-header">
    <div class="container">
      <div class="row" style="position:relative;">
    	  	<h2 class="span12 head-tittle">blog</h2>
		  	<div style="position:absolute; bottom:44px; left:20px; color:#fff;">
				{$category_title}
			</div>
      </div>
    </div>
  </div>
</div>

<div style="height:24px;"></div>

<div class="container">
    <div class="row">
	
		<div id="h_main">
			{foreach from=$rows item=row key=k}
			<div class="h_item">			
				<a href="{$url}{$row.pre_link}.html" title=""><img src="{$url}upload/blog/{$row.photo|default:'../../img_cust/default2.jpg'}" alt="{$row.seo_photo_alt}" class="h_item_img" /></a>
				<div class="h_item_text">
					<a href="{$url}{$row.pre_link}.html" title="{$row.title}"><h3>{$row.title}</h3></a>
					
					<div>{$row.description|truncate:400|strip_tags}</div>
				</div>
				
				<div style="clear:both;"></div>
				
				<div class="h_item_readmore">
					<span>Ngày đăng : {$row.create_date|date_format:"%d/%m/%Y"}</span>
					<span class="h_a_readmore"><a href="{$url}{$row.pre_link}.html" title="Xem thêm">Xem thêm&nbsp;&#187;</a></span>
				</div>
			</div>
			{foreachelse}
			<div style="margin-left:20px; padding:0 0 20px;">
					<em><p>Chưa có bài viết nào</p></em>
				</div>
			{/foreach}
			
			
			<div class="page">
			<div style="display:inline-block;" class="cust_page">{$paging}</div>
				<link href="{$url}style_cust/paging_style.css" rel="stylesheet" type="text/css" />
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
			
		</div>
		
		<div id="h_right">
			{loadModule mod=blog task=category}
			{loadModule mod=blog task=list_top}
		</div>
		
    	<div class="clearfix"></div>
    </div>
</div>
